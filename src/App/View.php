<?php
namespace OlineShop\App;

class View extends \stdClass {

    const VIEWS_TEMPLATES_HEAD_PHP = "/../Views/templates/head.php";
    const VIEWS_TEMPLATES_NAVIGATION_PHP = "/../Views/templates/navigation.php";
    const VIEWS_TEMPLATES_FOOTER_PHP = "/../Views/templates/footer.php";
    const VIEWS_TEMPLATES_BANNER_PHP = "/../Views/templates/banner.php";
    const VIEWS_TEMPLATES_CONTAINER_PHP = "/../Views/templates/container.php";
    const PROPERTY_NOT_FOUND_ALERT = "{{PROPERTY NOT FOUND!!!}}";

    private string $actionNameForViews;
    private string $classNameForViews;
    public static string $errorMessage = '';

    public function __get($name) {
        if(property_exists($this, $name)) {
           return $this->{$name};
        } else {
            return "{{Property not existed !}}";

        }

    }

    public function render(string $pathToView, array $dataToRender): string {
        $this->storeDateToRender($dataToRender);
        $fileNameWithFullPath = __DIR__ . '/../Views . $this->classNameForViews . '/' . $pathToView . ".php"';
        if (file_exists($fileNameWithFullPath)) {
            $hearder = $this->getHeaderHtml();
            $content = $this->getContentHtml($fileNameWithFullPath);
            $hearder = $this->replacePlaceHolderWithContent($content, $header);
            $footer = $this->getFooterHtml();
            return $header . $footer;
        }

        return '';

    }

    private function storeDateToRender(array $dataToRender): void {
        foreach ($dataToRender as $key => $data) {
            $this->$key = $data;
        }

    }

    /**
     * @return string
     */
    public function getClassNameForViews(): string {
        return $this->classNameForViews;
    }

    /**
     * @param $classNameForViews
     * @return void
     */
    public function SetClassNameForViews($classNameForViews): void {
        $this->classNameForViews = $classNameForViews ;
    }

    /**
     * @return string
     */
    public function getActionNameForViews():string {
        return $this->actionNameForViews;
    }

    /**
     * @param $actionNameForViews
     * @return void
     */
    public function setActionNameForViews(string $actionNameForViews): void {
        $this->actionNameForViews = $actionNameForViews;
    }

    private function getHeaderHtml(): string|false
    {
        $data = $this;
        ob_start();
        require_once __DIR__ . self::VIEWS_TEMPLATES_HEAD_PHP;
        require_once __DIR__ . self::VIEWS_TEMPLATES_NAVIGATION_PHP;
        require_once __DIR__ . self::VIEWS_TEMPLATES_BANNER_PHP;
        require_once __DIR__ . self::VIEWS_TEMPLATES_CONTAINER_PHP;
        $hearder = ob_get_contents();
        ob_end_clean();
        return $header;
    }

    private function getContentHtml(string $fileNameWithFullPath): string|false
    {
        $data = $this;
        ob_start();
        require_once $fileNameWithFullPath;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    private function getFooterHtml(): string|false
    {
        $data = $this;
        ob_start();
        require_once __DIR__ . self::VIEWS_TEMPLATES_FOOTER_PHP;
        $footer = ob_get_contents();
        ob_end_clean();
        return $footer;
    }

    private function replacePlaceHolderWithContent(false|string $content, false|string $header): string|array|false
    {
        $header = str_replace(CONTENT_PLACE_HOLDER, $content, $header);
        return $header;
    }
}