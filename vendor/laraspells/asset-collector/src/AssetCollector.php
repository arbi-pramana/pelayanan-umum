<?php

namespace LaraSpells\AssetCollector;

class AssetCollector
{

    /**
     * @var array
     */
    protected $externalStyles = [];

    /**
     * @var array
     */
    protected $externalScripts = [];

    /**
     * @var array
     */
    protected $externalStyleAliases = [];

    /**
     * @var array
     */
    protected $externalScriptAliases = [];

    /**
     * @var array
     */
    protected $internalStyles = [];

    /**
     * @var array
     */
    protected $internalScripts = [];

    /**
     * @var array
     */
    protected $internalStyleAliases = [];

    /**
     * @var array
     */
    protected $internalScriptAliases = [];

    /**
     * Get external styles
     *
     * @return array
     */
    public function getExternalStyles()
    {
        return $this->externalStyles;
    }

    /**
     * Get external scripts
     *
     * @return array
     */
    public function getExternalScripts()
    {
        return $this->externalScripts;
    }

    /**
     * Get internal styles (<style> tags)
     *
     * @return array
     */
    public function getInternalStyles()
    {
        return $this->internalStyles;
    }

    /**
     * Get internal scripts
     *
     * @return array
     */
    public function getInternalScripts()
    {
        return $this->internalScripts;
    }

    /**
     * Add external style (css file)
     *
     * @param  string $cssFile
     * @param  string $alias
     * @return array
     */
    public function addExternalStyle($cssFile, $alias = null)
    {
        if (in_array($cssFile, $this->externalStyles) OR ($alias AND array_key_exists($alias, $this->externalStyleAliases))) {
            return;
        }

        $this->externalStyles[] = $cssFile;
        $index = count($this->externalStyles) - 1;
        if ($alias) {
            $this->externalStyleAliases[$alias] = $index;
        }
    }

    /**
     * Add external script (js file)
     *
     * @param  string $jsFile
     * @param  string $alias
     * @return array
     */
    public function addExternalScript($jsFile, $alias = null)
    {
        if (in_array($jsFile, $this->externalScripts) OR ($alias AND array_key_exists($alias, $this->externalScriptAliases))) {
            return;
        }

        $this->externalScripts[] = $jsFile;
        $index = count($this->externalScripts) - 1;
        if ($alias) {
            $this->externalScriptAliases[$alias] = $index;
        }
    }

    /**
     * Add internal style (<style> tags)
     *
     * @param  string $style
     * @param  string $alias
     * @return array
     */
    public function addInternalStyle($style, $alias = null)
    {
        if ($alias AND array_key_exists($alias, $this->internalStyleAliases)) {
            return;
        }

        $this->internalStyles[] = $style;
        $index = count($this->internalStyles) - 1;
        if ($alias) {
            $this->internalStyleAliases[$alias] = $index;
        }
    }

    /**
     * Add internal script
     *
     * @param  string $script
     * @param  string $alias
     * @return array
     */
    public function addInternalScript($script, $alias = null)
    {
        if ($alias AND array_key_exists($alias, $this->internalScriptAliases)) {
            return;
        }

        $this->internalScripts[] = $script;
        $index = count($this->internalScripts) - 1;
        if ($alias) {
            $this->internalScriptAliases[$alias] = $index;
        }
    }

    /**
     * Render external and internal styles
     *
     * @return string
     */
    public function renderStyles()
    {
        $styles = "";
        $externalStyles = $this->getExternalStyles();
        $internalStyles = $this->getInternalStyles();

        foreach($externalStyles as $style) {
            $url = $this->isUrl($style)? $style : asset($style);
            $styles .= "<link rel='stylesheet' href='{$url}'/>";
        }
        foreach ($internalStyles as $style) {
            $styles .= $style;
        }

        return $styles;
    }

    /**
     * Render external and internal scripts
     *
     * @return string
     */
    public function renderScripts()
    {
        $scripts = "";
        $externalScripts = $this->getExternalScripts();
        $internalScripts = $this->getInternalScripts();

        foreach($externalScripts as $script) {
            $url = $this->isUrl($script)? $script : asset($script);
            $scripts .= "<script type='text/javascript' src='{$url}'></script>";
        }
        foreach ($internalScripts as $script) {
            $scripts .= $script;
        }

        return $scripts;
    }

    /**
     * Check string is url or not
     *
     * @param  string $str
     * @return bool
     */
    protected function isUrl($str)
    {
        return (bool) preg_match("/^((https?\:)?\/\/)/", $str);
    }

}
