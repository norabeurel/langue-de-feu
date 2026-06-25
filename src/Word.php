<?php

namespace LangueDeFeu;

class Word
{

  /**
   * @var string
   */
  protected string $word;

  /**
   * @var string
   */
  protected string $terminaison;

  /**
   * @var string|null
   */
  protected ?string $wordTransform = null;

  /**
   * @var array
   */
  protected array $nasalVowels = array('ain','aim','ein','eim','oin','ien','ion','yon','aon','ean','an','en','on','in','un','am','em','om','im','um','yn','ym');

  /**
   * @var array
   */
  protected array $groupVowels = array('eau','ieu','oie','oui','aie','eui','uai','ueu','aou','oeu','eai','ai','au','ay','ei','eu','ey','ou','oi','oy','ui','ue','ua','ia','ie','io','ya','ye','yo','oe','œu','œ','æ');

  /**
   * @var array
   */
  protected array $vowels = array('a','à','À','â','Â','ä','Ä','e','é','É','è','È','ê','Ê','ë','Ë','i','î','Î','ï','Ï','o','ô','Ô','ö','Ö','u','ù','Ù','û','Û','ü','Ü','y','ÿ','Ÿ','œ','Œ','æ','Æ');

  /**
   * Construct Word
   */
  public function __construct(string $word, string $terminaison)
  {
    $this->word = $word;
    $this->terminaison = $terminaison;
    $this->wordTransform = $this->wordTransform();
  }

  /**
   * @return string
   */
  public function getWord(): string
  {
    return $this->word;
  }

  /**
   * @param string $word
   *
   * @return $this
   */
  public function setWord(string $word): Word
  {
    $this->word = $word;
    return $this;
  }

/**
 * @return string
 */
public function getTerminaison(): string
{
  return $this->terminaison;
}

/**
 * @param string $terminaison
 *
 * @return $this
 */
public function setTerminaison(string $terminaison): Word
{
  $this->terminaison = $terminaison;
  return $this;
}

  /**
   * @return string|null
   */
  public function getWordTransform(): ?string
  {
    return $this->wordTransform;
  }

  /**
   * @param string|null $wordTransform
   *
   * @return $this
   */
  public function setWordTransform(?string $wordTransform): Word
  {
    $this->wordTransform = $wordTransform;
    return $this;
  }

  protected function sortByLength(array $items): array
  {
    usort($items, static fn($a, $b) => strlen($b) <=> strlen($a));
    return $items;
  }

  protected function buildAlternation(array $items): string
  {
    $escaped = array_map(static fn($v) => preg_quote($v, '/'), $items);
    return implode('|', $escaped);
  }

  protected function wordTransform(): string
  {
    $vowelChars = 'aàâäeéèêëiîïoôöuùûüyÿAÀÂÄEÉÈÊËIÎÏOÔÖUÙÛÜYŸ';
    $denasalLookahead = '(?![' . $vowelChars . 'nmNM])';

    $nasalAlt = $this->buildAlternation($this->sortBylength($this->nasalVowels));
    $nasalBranch = '(?:' . $nasalAlt . ')' . $denasalLookahead;

    $oral = $this->sortByLength(array_merge($this->groupVowels, $this->vowels));
    $oralBranch = $this->buildAlternation($oral);

    $pattern = '/(' . $nasalBranch . '|' . $oralBranch . ')/iu';

    $terminaison = $this->terminaison;

    return preg_replace_callback($pattern, static function ($m) use ($terminaison){
      if ($terminaison == "f") {
        $char = ctype_upper($m[0]) ? "F" : "f";
      }
      else{
        $char = ctype_upper($m[0]) ? "G" : "g";
      }
      return $m[1] . $char . $m[1];

    }, $this->word);
  }

}