<?php

declare(strict_types=1);

namespace ngghao\Stopwords;

/**
 * Phonetic-Helper-Class
 *
 * @package ngghao\Stopwords
 */
class StopWords
{
    /**
     * @var array
     */
    protected $available_languages = [
        'en',
        'id',
        'vi'
    ];

    /**
     * @var string
     */
    protected $language;

    /**
     * @var array
     */
    private $stop_words = [];

    public function __construct(string $language = 'en')
    {
        $this->load($language);
    }

    /**
     * Load language-data from one language.
     *
     * @param string $language
     *
     * @return StopWords
     * @throws \Exception
     */
    public function load(string $language = 'en')
    {
        if (in_array($language, $this->available_languages, true) === false) {
            throw new \Exception("Language $language not supported");
        }

        $this->language = $language;
        $this->stop_words = $this->readFile($language);

        return $this;
    }

    /**
     * Get data from "/data/*.php".
     *
     * @param string $file_name language
     *
     * @return array Will return an empty array on error
     */
    protected function readFile(string $file_name): array
    {
        $result = [];

        $file = __DIR__ . '/data/' . $file_name . '.php';
        if (file_exists($file)) {
            /** @noinspection PhpIncludeInspection */
            $result = require $file;
        }

        return $result;
    }

    /**
     * Get the stop-words from one language.
     *
     * @return array
     *
     * @throws \Exception
     */
    public function get(): array
    {
        return $this->stop_words;
    }

    /**
     * @return string
     */
    public function getLanguage() {
        return $this->language;
    }
}
