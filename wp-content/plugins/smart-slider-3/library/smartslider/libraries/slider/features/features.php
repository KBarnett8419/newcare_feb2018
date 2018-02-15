<?php

N2Loader::import('libraries.image.image');
N2Loader::import('libraries.image.manager');

class N2SmartSliderFeatures {

    private $slider;

    public $allowBGImageAttachmentFixed = true;

    /**
     * @var N2SmartSliderFeatureFadeOnLoad
     */
    public $fadeOnLoad;

    /**
     * @var N2SmartSliderFeatureResponsive
     */
    public $responsive;

    /**
     * @var N2SmartSliderFeatureControls
     */
    public $controls;

    /**
     * @var N2SmartSliderFeatureLazyLoad
     */
    public $lazyLoad;

    /**
     * @var N2SmartSliderFeatureAlign
     */
    public $align;

    /**
     * @var N2SmartSliderFeatureBlockRightClick
     */
    public $blockRightClick;
    /**
     * @var N2SmartSliderFeatureAutoplay
     */
    public $autoplay;

    /**
     * @var N2SmartSliderFeatureTranslateUrl
     */
    public $translateUrl;

    /**
     * @var N2SmartSliderFeatureLayerMode
     */
    public $layerMode;

    /**
     * @var N2SmartSliderFeatureSlideBackground
     */
    public $slideBackground;


    /**
     * @var N2SmartSliderFeaturePostBackgroundAnimation
     */
    public $postBackgroundAnimation;

    /**
     * @var N2SmartSliderFeatureSpinner
     */
    public $loadSpinner;

    public $optimize;

    private $initCallbacks = array();

    public function __construct($slider) {
        $this->slider = $slider;

        $this->optimize        = new N2SmartSliderFeatureOptimize($slider);
        $this->fadeOnLoad      = new N2SmartSliderFeatureFadeOnLoad($slider);
        $this->align           = new N2SmartSliderFeatureAlign($slider);
        $this->responsive      = new N2SmartSliderFeatureResponsive($slider, $this);
        $this->controls        = new N2SmartSliderFeatureControls($slider);
        $this->lazyLoad        = new N2SmartSliderFeatureLazyLoad($slider);
        $this->margin          = new N2SmartSliderFeatureMargin($slider);
        $this->blockRightClick = new N2SmartSliderFeatureBlockRightClick($slider);
        $this->maintainSession = new N2SmartSliderFeatureMaintainSession($slider);
        $this->autoplay        = new N2SmartSliderFeatureAutoplay($slider);
        $this->translateUrl    = new N2SmartSliderFeatureTranslateUrl($slider);
        $this->layerMode       = new N2SmartSliderFeatureLayerMode($slider);
        $this->slideBackground = new N2SmartSliderFeatureSlideBackground($slider);
        $this->loadSpinner = new N2SmartSliderFeatureSpinner($slider);
		$this->removeSpaces();
    }
	
	public function removeSpaces(){
		$id = 'jQuery("#' . $this->slider->elementId . '-align")';
		$parentlist = preg_replace('/\s+/', '', $this->slider->params->get('remove-spaces-from-parents', ''));
		$js = '';
		if(!empty($parentlist)){
			$parents = array_map('intval', explode(',', $parentlist));
			$js .= '(function(){';
			foreach($parents AS $parent){
				$js .= $id;
				for($i = 0; $i < $parent; $i++){
					$js .= '.parent()';
				}
				$js .= '.css({padding:0, margin:0});';
			}
		}
		$siblinglist = preg_replace('/\s+/', '', $this->slider->params->get('hide-siblings', ''));
		if(!empty($siblinglist)){
			$siblings = array_map('intval', explode(',', $siblinglist));
			if(empty($js)){
				$js .= '(function(){';
			}
			foreach($siblings AS $sibling){
				$sibling = $sibling - 1;
				$js .= $id . '.siblings().eq(' . $sibling . ').hide(0);';
			}
		}
		if(!empty($js)){			
			$js .= '})();';
			N2JS::addInline($js);
		}
	}

    public function generateJSProperties() {

        $return         = array(
            'admin'          => $this->slider->isAdmin,
            'translate3d'    => intval(N2SmartSliderSettings::get('hardware-acceleration', 1)),
            'callbacks'      => $this->slider->params->get('callbacks', '')
        );
        $randomizeCache = $this->slider->params->get('randomize-cache', 0);
        if (!$this->slider->isAdmin && $randomizeCache) {
            $return['randomize'] = array(
                'randomize'      => intval($this->slider->params->get('randomize', 0)),
                'randomizeFirst' => intval($this->slider->params->get('randomizeFirst', 0))
            );
        }

        $this->makeJavaScriptProperties($return);

        if (count($this->slider->slides) > 1) {
            $this->allowBGImageAttachmentFixed = false;
        }
        $return['allowBGImageAttachmentFixed'] = $this->allowBGImageAttachmentFixed;

        return $return;
    }

    protected function makeJavaScriptProperties(&$properties) {
        $this->align->makeJavaScriptProperties($properties);
        $this->fadeOnLoad->makeJavaScriptProperties($properties);
        $this->responsive->makeJavaScriptProperties($properties);
        $this->controls->makeJavaScriptProperties($properties);
        $this->lazyLoad->makeJavaScriptProperties($properties);
        $this->blockRightClick->makeJavaScriptProperties($properties);
        $this->maintainSession->makeJavaScriptProperties($properties);
        $this->autoplay->makeJavaScriptProperties($properties);
        $this->layerMode->makeJavaScriptProperties($properties);
        $this->slideBackground->makeJavaScriptProperties($properties);
        $properties['initCallbacks'] = $this->initCallbacks;
    }

    /**
     * @param $slide N2SmartSliderSlide
     */
    public function makeSlide($slide) {
    }

    /**
     * @param $slide N2SmartSliderSlide
     *
     * @return string
     */
    public function makeBackground($slide) {

        return $this->slideBackground->make($slide);
    }

    public function addInitCallback($callback) {
        $this->initCallbacks[] = $callback;
    }
}