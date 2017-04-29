<?php

if (!function_exists('getTranslationUrl')) {
  /**
   * description
   *
   * @param
   * @return
   */
  function getTranslationUrl($lang)
  {
    $currentRoute = Route::getCurrentRoute();
    if(isset($currentRoute) && $currentRoute) {
      $parameters = $currentRoute->parameters();
      $action = $currentRoute->getAction();

      if(isset($action) && $action && isset($action['translation'])) {
        $routeKey = $action['translation'];

        if(!empty($parameters)) {
          $encodedParams = urlencode(current($parameters));

          if (isset($action['model'])) {
            $model = $action['model'];
            $static = $model::whereTranslation('slug', $encodedParams)->first();
            $static = $static->getTranslation($lang);
            $encodedParams = $static->slug;
          }

          return Lang::get($routeKey, array(), $lang) . '/' .$encodedParams;
        } else {
          return Lang::get($routeKey, array(), $lang);
        }
      }
    }
  }
}
