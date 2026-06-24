<?php

namespace LangueDeFeu;

use Vanderlee\Syllable\Syllable;
use Vanderlee\Syllable\Hyphen;

class Word
{

  /**
   * @var string
   */
  protected string $word;


  /**
   * @var string|null
   */
  protected ?string $wordTransform = null;

  /**
   * @var array
   */
  protected array $vowel = array('a', 'à', 'â', 'e', 'é', 'è', 'ê', 'ë', 'i', 'î', 'ï', 'o', 'ô', 'u', 'ù', 'û', 'ü', 'y', 'ÿ', 'œ');
  protected array $groupVowel = array('aa', 'ae', 'ai', 'ao', 'au', 'ay', 'ea', 'ee', 'ei', 'eo', 'eu', 'ey', 'ia', 'ie', 'ii', 'io', 'iu', 'iy', 'oa', 'oe', 'oi', 'oo', 'ou', 'oy', 'ua', 'ue', 'ui', 'uo', 'uu', 'uy', 'ya', 'ye', 'yi', 'yo', 'yu', 'yy', 'eau', 'ieu', 'oie', 'oui', 'aie', 'eui', 'uai', 'ueu', 'aou', 'ioe', 'iou', 'aea', 'aee', 'aei', 'aeo', 'aeu', 'ayo', 'eai', 'eeu', 'eoi', 'eou', 'iai', 'iau', 'iee', 'iei', 'ioi', 'oai', 'oei', 'oeu', 'oua', 'oue', 'uya', 'an', 'en', 'un', 'am', 'ain', 'em', 'um', 'in', 'on', 'om', 'im', );

  /**
   * Construct Word
   */
  public function __construct(string $word)
  {
    $this->word = $word;
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

  /**
   *
   * @return string
   */
  protected function wordTransform(): string
  {
    $word = $this->word;


    $wordTransform = $word;

    return $wordTransform;

  }
}