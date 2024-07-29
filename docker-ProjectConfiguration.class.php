<?php

namespace project;

date_default_timezone_set('America/Sao_Paulo');

require_once dirname(__FILE__) . '/bootstrap.php';

class ProjectConfiguration extends \ifrit\ifritProjectConfiguration
{
  protected function setup() {
    $this
      ->setup_cdn()
      ->setup_limit_free()
      ->setup_debug()
      ->setup_mysql()
      ->setup_facebook()
    ;
  }
  
  /**
   * 
   **/
  protected function setup_cdn()
  {
    static::set(array(
      'cdn_url' => "https://cdn.estudarparaoab.com.br",
      //'cdn_url' => "",
    ));
    return $this;
  }
  
  /**
   * 
   **/
  protected function setup_limit_free()
  {
    /*
    static::set(array(
      LIMITE_RESOLUCAO_QUESTAO => 100,
      LIMITE_CRIACAO_PLANO_DE_ESTUDO => 1,
      LIMITE_TEMPO_PLANO_DE_ESTUDO => 7,
      LIMITE_CADERNOS => 5,
      LIMITE_ANOTACOES => 10,
    ));
    */
    static::set(array(
      LIMITE_USO_PLANO_DE_ESTUDO => 3
    ));
    return $this;
  }
  
  /**
   * 
   **/
  protected function setup_debug()
  {
    if ((!(strripos($_SERVER["REQUEST_URI"], "/fc/manager/") === false))) {
      static::set(array(
        'debug' => false,
        'enable_cache' => false
      ));
    } else 
    if ($_SERVER["SERVER_NAME"] == "desenv.meupreparatorio.com.br") {
      static::set(array(
        'debug' => false,
        'enable_cache' => false
      ));
    } else {
      static::set(array(
        'debug' => false,
        'enable_cache' => true
      ));
    }
    return $this;
  }
  
  /**
   * 
   **/
  protected function setup_facebook()
  {
    static::set(array(
      'facebook_app_id' => "249088192273888",
      'facebook_app_secret' => "01329f531d80c5ee2592540e923c2d06",
      'facebook_default_graph_version' => "v2.9"
    ));

    return $this;
  }

  /**
   * 
   */
  protected function setup_mysql()
  {
    // if ($_SERVER["SERVER_NAME"] == "localhost") {
      // static::set(array(
      //   'mysql.default.servers'   => 'localhost',
      //   'mysql.default.database'  => 'preparatorio',
      //   'mysql.default.user'      => 'root',
      //   'mysql.default.password'  => '',
      // ));

      // static::set(array(
      //   'mysql.track.servers'   => '54.39.189.77',
      //   'mysql.track.database'  => 'track',
      //   'mysql.track.user'      => 'track-ads',
      //   'mysql.track.password'  => 'X@j9c6q1',
      // ));

    // } else {

    //   static::set(array(
    //     'mysql.default.servers'   => '54.39.186.77',
    //     'mysql.default.database'  => 'preparatorio', // fconcursos
    //     'mysql.default.user'      => 'prep-user', // fonte114577
    //     'mysql.default.password'  => 'qr&52x0V', // 1ah#Fb15
    //   ));

    //   static::set(array(
    //     'mysql.track.servers'   => '54.39.189.77',
    //     'mysql.track.database'  => 'track',
    //     'mysql.track.user'      => 'track-ads',
    //     'mysql.track.password'  => 'X@j9c6q1',
    //   ));

    // }

    static::set(array(
      'mysql.default.servers'   => '172.17.0.1',
      'mysql.default.database'  => 'prep',
      'mysql.default.user'      => 'root',
      'mysql.default.password'  => 'root_password',
    ));

    return $this;
  }
}
