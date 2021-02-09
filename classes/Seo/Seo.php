<?php

namespace Insult\Seo;

/**
 * All about SEO
 *
 * Class Seo
 */
class Seo
{
    /**
     * @var string
     */
    public $page_title = '';

    /**
     * @var string
     */
    public $page_description = '';

    /**
     * @var
     */
    public $request_url;

    public function getPageUrl()
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * Sets title tag for different pages
     *
     * @return string
     */
    public function setPageTitle()
    {
        $request_url = $this->getPageUrl();

        switch ($request_url) {
            case '/random.php':
                $this->page_title = 'Случайное оскорбление';
                break;
            case '/form.php':
                $this->page_title = 'Добавить оскорбление';
                break;
            case '/about.php':
                $this->page_title = 'О сайте';
                break;
            default:
                $this->page_title = 'Оскорбляй красиво';
        }

        return $this->page_title;
    }

    /**
     * Sets meta description tag content
     */
    public function setPageDescription()
    {
        $request_url = $this->getPageUrl();

        switch ($request_url) {
            case '/random.php':
                $this->page_description = 'Зацени креативное оскорбление. Используй его. Удиви своего оппонента. Оскорбляй красиво. Еще больше оскорблений на INSULT.SPACE';
                break;
            case '/form.php':
                $this->page_description = 'Мы собираем базу самых жестких, интересных и необычных оскорблений. Добавь свое оскорбление или ответку. Подключай мозг и поделись своими самыми жесткими оскорблениями. Оскорбляй красиво.';
                break;
            case '/about.php':
                $this->page_description = 'На этом сайте мы собираем базу самых жестких, интересных и необычных оскорблений для споров. Найди самое подходящее для своего спора или добавь свое. Оскорбляй красиво.';
                break;
            default:
                $this->page_description = 'База самых жестких, интересных и необычных оскорблений. Используй их в стеб батлах с друзьями, в спорах в интернете и для троллинга. Оскорбляй красиво.';
        }

        return $this->page_description;
    }
}