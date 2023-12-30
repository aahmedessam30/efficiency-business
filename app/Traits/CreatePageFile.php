<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait CreatePageFile
{
    public static function createPageVueFile($page): void
    {
        $pageName       = Str::studly($page->title);
        $pagePath       = resource_path("js/Pages/$pageName/index.vue");
        $sections       = [];
        $components     = [];
        $importSections = [];
        $props          = [];

        foreach ($page->sections as $index => $section) {
            $sections[] = Str::of($section->sectionType->component)
                ->when($index !== 0, fn ($str) => $str->prepend("\t\t<"), fn ($str) => $str->prepend("<"))
                ->append(' />');

            $components[] = Str::of($section->sectionType->component)
                ->when($index !== 0, fn ($str) => $str->prepend("\t\t\t\t"), fn ($str) => $str->prepend("\t"))
                ->append(',');

            $importSections[] = Str::of($section->sectionType->component_path)
                ->prepend("import {$section->sectionType->component} from '@/")
                ->append("';");

            $props[] = Str::of($section->sectionType->name)
                ->lcfirst()
                ->camel()
                ->append(": {\n\t\t\t\t\trequired: true,\n\t\t\t\t\ttype: Object | Array,\n\t\t\t\t},");
        }

        $file = str_replace('\\', '/', $pagePath);
        $stub = str_replace(
            ['{{ pageName }}', '{{ sections }}', '{{ importSections }}', '{{ components }}', '{{ props }}'],
            [
                $pageName,
                implode("\n", $sections),
                implode("\n", $importSections),
                implode("\n", $components),
                implode("\n", $props),
            ],
            file_get_contents(base_path('stubs/vuepage.stub'))
        );

        if (!is_dir(dirname($file)) && !mkdir($concurrentDirectory = dirname($file)) && !is_dir($concurrentDirectory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }

        if (!file_exists($file)) {
            file_put_contents($file, $stub);
        }

        static::appendPageRoute($page, $pageName);
    }

    public static function appendPageRoute($page, $pageName): void
    {
        $routes    = file_get_contents(base_path('routes/web.php'));
        $pageRoute = "\nRoute::get('/$page->slug', [PageController::class, '" . lcfirst($pageName) . "'])->name('page.$page->slug');";

        if (!Str::contains($routes, $pageRoute)) {
            file_put_contents(base_path('routes/web.php'), $pageRoute, FILE_APPEND);
        }

        if (!Str::contains(file_get_contents(app_path('Http/Controllers/PageController.php')), "public function " . lcfirst($pageName) . "()")) {
            static::addMethodToController($page, $pageName);
        }
    }

    public static function addMethodToController($page, $pageName): void
    {
        $methodContent = static::addSectionComponentMethodToController($page, $pageName);

        $controller = file_get_contents(app_path('Http/Controllers/PageController.php'));
        $method     = "\n\tpublic function " . lcfirst($pageName) . "()\n\t{\n\t\t$methodContent\n\t}";

        // get the last closing bracket
        $lastBracket = strrpos($controller, '}');

        // remove the last closing bracket
        $controller = substr_replace($controller, '', $lastBracket, 1);

        // add the new method
        $controller .= $method;

        // add the closing bracket
        $controller .= "\n}";

        file_put_contents(app_path('Http/Controllers/PageController.php'), $controller);
    }

    public static function addSectionComponentMethodToController($page, $pageName): string
    {
        $methodContent = '';
        $variables     = [];

        foreach ($page->sections as $index => $section) {
            $variableAlias = Str::of($section->sectionType->name)->lcfirst()->camel();
            $variable      = $variableAlias->prepend('$')->append('Section');

            $method = Str::of($section->sectionType->name)
                ->lcfirst()
                ->camel()
                ->prepend("$variable = SharedComponents::")
                ->append('Section();');

            $variables["$variableAlias"] = "$variable";
            $methodContent              .= $index === 0 ? "$method" : "\n\t\t$method";

            if ($index === count($page->sections) - 1) {
                $methodContent .= "\n\t\treturn inertia('$pageName/index', [";
                foreach ($variables as $alias => $variable) {
                    $methodContent .= "\n\t\t\t'$alias' => $variable,";
                }
                $methodContent .= "\n\t\t]);";
            }
        }

        return $methodContent;
    }
}
