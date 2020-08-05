<?php

use ngghao\Stopwords\StopWords;

/**
 * Class PhoneticAlgorithmsTest
 */
class StopWordsTest extends \PHPUnit\Framework\TestCase
{
    public function testForGermanStopWords()
    {
        $stop_words = new StopWords();

        self::assertTrue( $stop_words->getLanguage() === 'en' );

        $data_test = [
            'a',
            'about',
            'above',
            'above',
            'across',
            'after',
            'afterwards',
            'again',
            'against',
        ];

        foreach ($data_test as $str) {
            self::assertTrue( in_array($str, $stop_words->get(), true));
        }
    }

//  public function testForAllStopWords()
//  {
//    $stopWords = new StopWords();
//    $testStrings = [
//        'a',
//        'ahogy',
//        'ahol',
//        'aki',
//        'akik',
//        'akkor',
//    ];
//
//    $result = $stopWords->getStopWordsAll();
//
//    foreach ($testStrings as $testString) {
//      self::assertTrue(
//          in_array($testString, $result['hu'], true),
//          'tested: ' . $testString
//      );
//    }
//  }
//
//  /**
//   * @expectedException \voku\helper\StopWordsLanguageNotExists
//   */
//  public function testForNonExistingLanguage()
//  {
//    $stopWords = new StopWords();
//    $stopWords->getStopWordsFromLanguage('foo');
//  }
}
