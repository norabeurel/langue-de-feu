<?php

namespace LangueDeFeu;
use LangueDeFeu\Request;
use LangueDeFeu\Word;
use Vanderlee\Syllable\Syllable;

class LangueDeFeu
{

  /**
   * @var Request
   */
  protected Request $request;

  /**
   * @var array
   */
  protected array $words = array();

  /**
   * @var array
   */
  protected array $errors = array();

  /**
   * Construct LangueDeFeu
   */
  public function __construct()
  {
    $this->request = new Request();
    Syllable::setCacheDir(__DIR__ . '/../cache');
  }

  /**
   * @return $this
   */
  public function execute(): LangueDeFeu
  {
    if($this->request->isPost())
    {
      if(!$this->request->getValueByFieldname('word'))
      {
        $this->addError("word", "Cette valeur est requise !!!");
      }

      if(count($this->errors) <= 0)
      {
        $wordsSends = $this->request->getValueByFieldname("word");
        preg_match_all("/[\p{L}'']+/u", $wordsSends, $words);
        foreach ($words[0] as $word)
        {
          $this->addWord($word);
        }
      }
    }
    return $this;
  }

  /**
   * @return Request
   */
  public function getRequest(): Request
  {
    return $this->request;
  }


  /**
   * @param string $word
   *
   * @return $this
   */
  public function addWord(string $word): LangueDeFeu
  {
    $this->words[] = new Word($word);
    return $this;
  }

  /**
   * @return string
   */
  public function viewTransformWords(): string
  {
    $wordsSearch = array();
    $wordsReplace = array();
    /** @var Word $word */
    foreach($this->getWords() as $word)
    {
      $wordsSearch[] = "/(?<![A-Za-z'])" . preg_quote($word->getWord(), '/') . "(?![A-Za-z'])/";
      $wordsReplace[] = $word->getWordTransform();
    }
    if($this->request->getValueByFieldname("word") && count($this->errors) <= 0)
    {
      return preg_replace($wordsSearch, $wordsReplace, $this->request->getValueByFieldname("word"));
    }
    return "";
  }

  /**
   * @return array
   */
  public function getWords(): array
  {
    return $this->words;
  }

  /**
   * @param array $words
   *
   * @return $this
   */
  public function setWords(array $words): LangueDeFeu
  {
    $this->words = $words;
    return $this;
  }

  /**
   * @param string $fieldname
   * @param string $message
   *
   * @return $this
   */
  public function addError(string $fieldname, string $message): LangueDeFeu
  {
    $this->errors[$fieldname] = $message;
    return $this;
  }

  /**
   * @param string $fieldname
   *
   * @return string|null
   */
  public function getErrorByFieldname(string $fieldname): ?string
  {
    return array_key_exists($fieldname, $this->errors) ? $this->errors[$fieldname] : null;
  }

  /**
   * @return array
   */
  public function getErrors(): array
  {
    return $this->errors;
  }

  /**
   * @param array $errors
   *
   * @return $this
   */
  public function setErrors(array $errors): LangueDeFeu
  {
    $this->errors = $errors;
    return $this;
  }

}