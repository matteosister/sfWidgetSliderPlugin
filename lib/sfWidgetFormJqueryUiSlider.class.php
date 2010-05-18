<?php

class sfWidgetFormJqueryUiSlider extends sfWidgetForm
{
  protected function configure($options = array(), $attributes = array())
  {
    
  }

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $attributes = array_merge($attributes, array('size' => 4));

    $idField = $this->generateId($name);
    $jsCode = '<script type="text/javascript">';
    $jsCode .= '$("#'.$idField.'_div").slider({
      animate: true,
      min: 0,
      max: 100,
      value: '.$value.',
      slide: function(event, ui) { $("#'.$idField.'").val(ui.value); }
    });';
    $jsCode .= '</script>';

    $input = $this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'name' => $name, 'value' => $value), $attributes));
    return '<div class="sfwidget-slider-container"><div id="'.$idField.'_div"></div>'.$input.'</div>'.$jsCode;
  }

  public function getJavascripts()
  {
    return array(
      '/sfWidgetSliderPlugin/js/jquery-ui-1.8.1.custom.min.js'
    );
  }

  public function getStylesheets()
  {
    return array(
      '/sfWidgetSliderPlugin/css/jquery-ui-1.8.1.custom.css' => 'screen',
      '/sfWidgetSliderPlugin/css/custom.css' => 'screen'
    );
  }
}