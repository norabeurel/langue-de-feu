<?php

namespace LangueDeFeu;

class Request
{
  
  /**
   * @var boolean
   */
  protected bool $isPost = false;

  /**
   * @var array
   */
  protected array $request = array();

  /**
   * Construct Request
   */
  public function __construct()
  {
    $this->isPost = $_SERVER['REQUEST_METHOD'] === "POST";
    $this->request = $_POST ?? array();
  }

  /**
   * @return bool
   */
  public function isPost(): bool
  {
    return $this->isPost;
  }

  /**
   * @param $fieldname
   *
   * @return bool
   */
  public function has($fieldname): bool
  {
    return array_key_exists($fieldname, $this->request);
  }

  /**
   * @param string $fieldname
   * @param $default
   *
   * @return mixed
   */
  public function getValueByFieldname(string $fieldname, $default = null): mixed
  {
    return $this->has($fieldname) ? $this->request[$fieldname] : $default;
  }

}