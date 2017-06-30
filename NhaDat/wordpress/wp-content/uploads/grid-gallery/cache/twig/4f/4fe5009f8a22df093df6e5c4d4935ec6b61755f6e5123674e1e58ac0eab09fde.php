<?php

/* @galleries/shortcode/helpers.twig */
class __TwigTemplate_d1b2213c73cf2ebef76ba5ad2d560a3ef14ba204db71c4a34df305073a689eb4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'a_attributes' => array($this, 'block_a_attributes'),
            'a_attributes_href' => array($this, 'block_a_attributes_href'),
            'figure_before' => array($this, 'block_figure_before'),
            'galleryTypeBlock' => array($this, 'block_galleryTypeBlock'),
            'figure_attributes' => array($this, 'block_figure_attributes'),
            'image_attributes' => array($this, 'block_image_attributes'),
            'figcaption_style' => array($this, 'block_figcaption_style'),
            'figcaption_attributes' => array($this, 'block_figcaption_attributes'),
            'figcaption_wrap' => array($this, 'block_figcaption_wrap'),
            'figcaption_after' => array($this, 'block_figcaption_after'),
            'figure_after' => array($this, 'block_figure_after'),
            'oneGalleryImage' => array($this, 'block_oneGalleryImage'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        ob_start();
        // line 2
        echo "\t";
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "type", array()) != "none")) {
            // line 3
            echo "\t\tborder: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "width", array()), "html", null, true);
            echo "px ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "type", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "color", array()), "html", null, true);
            echo ";
\t";
        }
        // line 5
        echo "\tborder-radius: ";
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "radius", array()) . twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "radius_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
        echo ";
\t";
        // line 6
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "use_shadow", array()) == 1)) {
            // line 7
            echo "\t\tbox-shadow: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "shadow", array()), "x", array()), "html", null, true);
            echo "px ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "shadow", array()), "y", array()), "html", null, true);
            echo "px ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "shadow", array()), "blur", array()), "html", null, true);
            echo "px ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "shadow", array()), "color", array()), "html", null, true);
            echo ";
\t";
        }
        // line 8
        echo ";
\tmargin: ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "distance", array()), "html", null, true);
        echo "px;";
        // line 11
        echo "\t";
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == "2")) {
            // line 12
            echo "\t\theight:";
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height", array()) . twig_replace_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
            echo ";
\t";
        }
        // line 14
        echo "\t";
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == "2")) {
            // line 15
            echo "\t\twidth:auto;
\t";
        } else {
            // line 17
            echo "\t\twidth:";
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width", array()) . twig_replace_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
            echo ";
\t";
        }
        $context["figureStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 20
        echo "
";
        // line 21
        ob_start();
        // line 22
        echo "\t";
        if (($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "description", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "description", array())))) {
            // line 23
            echo "\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "description", array()), "html", null, true);
            echo "
\t";
        } else {
            // line 25
            echo "\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "title", array()), "html", null, true);
            echo "
\t";
        }
        $context["aTitle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 28
        echo "
";
        // line 29
        ob_start();
        // line 30
        echo "\t";
        if (((( !$this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "external_link", array(), "any", true, true) || twig_test_empty(trim($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "external_link", array())))) && ( !$this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "video", array(), "any", true, true) || twig_test_empty(trim($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array()))))) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "0"))) {
            // line 31
            echo "\t\tgg-colorbox
\t";
        }
        // line 33
        echo "
\t";
        // line 34
        if ((($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "video", array(), "any", true, true) &&  !twig_test_empty(trim($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array())))) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "0"))) {
            // line 35
            echo "\t\tgg-video
\t";
        }
        // line 37
        echo "
\t";
        // line 38
        if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "2") && (( !$this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "external_link", array(), "any", true, true) || twig_test_empty(trim($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "external_link", array())))) || ($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "video", array(), "any", true, true) &&  !twig_test_empty(trim($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array()))))))) {
            // line 39
            echo "\t\tpbox
\t";
        }
        $context["aClass"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 42
        echo "
";
        // line 43
        ob_start();
        // line 44
        echo "\t";
        if (($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "external_link", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "external_link", array())))) {
            // line 45
            echo "\t\t";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('force_http')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "external_link", array()))), "html", null, true);
            echo "
\t\t";
            // line 46
            $context["link"] = true;
            // line 47
            echo "\t";
        } else {
            // line 48
            echo "\t\t";
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "url", array()) . "?gid=") . $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array())), "html", null, true);
            echo "
\t";
        }
        $context["aHref"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 51
        echo "
";
        // line 52
        ob_start();
        // line 53
        echo "\t";
        if (((isset($context["link"]) ? $context["link"] : null) && $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "rel", array(), "any", true, true))) {
            // line 54
            echo "\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "rel", array()), "html", null, true);
            echo "
\t";
        }
        // line 56
        echo "\t";
        if ((((isset($context["link"]) ? $context["link"] : null) == false) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "enabled", array()) == "false"))) {
            // line 57
            echo "\t\tnofollow
\t";
        }
        $context["aRel"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 60
        echo "
";
        // line 61
        ob_start();
        // line 62
        echo "
\t";
        // line 63
        ob_start();
        // line 64
        echo "\t\t";
        $this->displayBlock('a_attributes', $context, $blocks);
        // line 82
        echo "\t";
        $context["var_a_attributes"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 83
        echo "
\t";
        // line 84
        ob_start();
        // line 85
        echo "\t\t";
        $this->displayBlock('figure_before', $context, $blocks);
        // line 90
        echo "\t";
        $context["var_figure_before"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 91
        echo "
\t";
        // line 92
        ob_start();
        // line 93
        echo "\t\t";
        $this->displayBlock('galleryTypeBlock', $context, $blocks);
        // line 116
        echo "\t";
        $context["galleryType"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 117
        echo "
\t";
        // line 118
        ob_start();
        // line 119
        echo "\t\t";
        $this->displayBlock('figure_attributes', $context, $blocks);
        // line 140
        echo "\t";
        $context["var_figure_attributes"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 141
        echo "
\t";
        // line 142
        list($context["width"], $context["height"], $context["crop"]) =         array(0, 0, 0);
        // line 143
        echo "
\t";
        // line 144
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width_unit", array()) == 0)) {
            // line 145
            echo "\t\t";
            $context["width"] = $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width", array());
            // line 146
            echo "\t";
        } else {
            // line 147
            echo "\t\t";
            // line 148
            echo "\t\t";
            if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "width_unit", array()) == 0)) {
                // line 149
                echo "\t\t\t";
                $context["width"] = round((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "width", array()) / 100) * $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width", array())));
                // line 150
                echo "\t\t";
            } else {
                // line 151
                echo "\t\t\t";
                $context["width"] = null;
                // line 152
                echo "\t\t";
            }
            // line 153
            echo "\t";
        }
        // line 154
        echo "
\t";
        // line 155
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height_unit", array()) == 0)) {
            // line 156
            echo "\t\t";
            $context["height"] = $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height", array());
            // line 157
            echo "\t";
        } else {
            // line 158
            echo "\t\t";
            // line 159
            echo "\t\t";
            $context["height"] = null;
            // line 160
            echo "\t\t";
            // line 161
            echo "\t\t";
            // line 162
            echo "\t\t";
            // line 163
            echo "\t\t";
            // line 164
            echo "\t\t";
            // line 165
            echo "\t";
        }
        // line 166
        echo "
\t";
        // line 167
        if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == 0) || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == 3))) {
            // line 168
            echo "\t\t";
            $context["crop"] = 1;
            // line 169
            echo "\t";
        }
        // line 170
        echo "
\t";
        // line 171
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == 1)) {
            // line 172
            echo "\t\t";
            $context["height"] = null;
            // line 173
            echo "\t";
        }
        // line 174
        echo "
\t";
        // line 175
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == 2)) {
            // line 176
            echo "\t\t";
            $context["width"] = null;
            // line 177
            echo "\t";
        }
        // line 178
        echo "
\t";
        // line 179
        if (($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "isNotRealAttachment", array()) == 1)) {
            // line 180
            echo "\t\t";
            $context["previewImgUrl"] = $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "url", array());
            // line 181
            echo "\t";
        } else {
            // line 182
            echo "\t\t";
            $context["previewImgUrl"] = call_user_func_array($this->env->getFunction('get_attachment')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "id", array()), (isset($context["width"]) ? $context["width"] : null), (isset($context["height"]) ? $context["height"] : null), $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "cropPosition", array()), (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "cropQuality", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "cropQuality", array()), "100")) : ("100"))));
            // line 183
            echo "\t";
        }
        // line 184
        echo "
\t";
        // line 185
        ob_start();
        // line 186
        echo "\t\t";
        $this->displayBlock('image_attributes', $context, $blocks);
        // line 202
        echo "\t";
        $context["var_image_attributes"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 203
        echo "
\t";
        // line 204
        ob_start();
        // line 205
        echo "\t\t";
        $this->displayBlock('figcaption_style', $context, $blocks);
        // line 228
        echo "\t";
        $context["figcaptionStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 229
        echo "
\t";
        // line 230
        ob_start();
        // line 231
        echo "\t\t";
        $this->displayBlock('figcaption_attributes', $context, $blocks);
        // line 238
        echo "\t";
        $context["var_figcaption_attributes"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 239
        echo "
\t";
        // line 240
        $context["prepareImgUrl"] = (($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "url", array()) . "?gid=") . $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()));
        // line 241
        echo "
\t";
        // line 242
        ob_start();
        // line 243
        echo "\t\t";
        $this->displayBlock('figcaption_wrap', $context, $blocks);
        // line 317
        echo "\t";
        $context["var_figcaption_wrap"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 318
        echo "
\t";
        // line 319
        ob_start();
        // line 320
        echo "\t\t";
        $this->displayBlock('figcaption_after', $context, $blocks);
        // line 360
        echo "\t";
        $context["var_figcaption_after"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 361
        echo "
\t";
        // line 362
        ob_start();
        // line 363
        echo "\t\t";
        $this->displayBlock('figure_after', $context, $blocks);
        // line 368
        echo "\t";
        $context["var_figure_after"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 369
        echo "
\t";
        // line 370
        $this->displayBlock('oneGalleryImage', $context, $blocks);
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 64
    public function block_a_attributes($context, array $blocks = array())
    {
        // line 65
        echo "\t\t\tid=\"gg-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "id", array()), "html", null, true);
        echo "\"
\t\t\tclass=\"gg-link ";
        // line 66
        echo twig_escape_filter($this->env, trim((isset($context["aClass"]) ? $context["aClass"] : null)), "html", null, true);
        echo " ";
        if ((($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "displayFirstPhoto", array()) == "on") && ((isset($context["index"]) ? $context["index"] : null) > 0))) {
            echo " hidden-item ";
        }
        echo "\"
\t\t\t";
        // line 67
        $this->displayBlock('a_attributes_href', $context, $blocks);
        // line 71
        echo "\t\t\ttitle=\"";
        echo twig_escape_filter($this->env, trim((isset($context["aTitle"]) ? $context["aTitle"] : null)), "html", null, true);
        echo "\"
\t\t\t";
        // line 72
        if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "1") && ((isset($context["link"]) ? $context["link"] : null) == false))) {
            // line 73
            echo "\t\t\t\tdata-rel=\"prettyPhoto[pp_gal]\"
\t\t\t";
        } else {
            // line 75
            echo "\t\t\t\trel=\"";
            echo twig_escape_filter($this->env, (isset($context["aRel"]) ? $context["aRel"] : null), "html", null, true);
            echo "\"
\t\t\t";
        }
        // line 77
        echo "\t\t\t";
        if (((isset($context["link"]) ? $context["link"] : null) == true)) {
            // line 78
            echo "\t\t\t\tdata-type=\"link\"
\t\t\t";
        }
        // line 80
        echo "\t\t\tstyle=\"border-radius: ";
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "radius", array()) . twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "radius_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
        echo ";\"
\t\t";
    }

    // line 67
    public function block_a_attributes_href($context, array $blocks = array())
    {
        // line 68
        echo "\t\t\t\thref=\"";
        echo twig_escape_filter($this->env, htmlspecialchars_decode(trim((isset($context["aHref"]) ? $context["aHref"] : null))), "html", null, true);
        echo "\"
\t\t\t\ttarget=\"";
        // line 69
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "target", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "target", array()), "_self")) : ("_self")), "html", null, true);
        echo "\"
\t\t\t";
    }

    // line 85
    public function block_figure_before($context, array $blocks = array())
    {
        // line 86
        echo "\t\t\t";
        if (( !$this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "false"))) {
            // line 87
            echo "\t\t\t\t<a ";
            echo twig_escape_filter($this->env, (isset($context["var_a_attributes"]) ? $context["var_a_attributes"] : null), "html", null, true);
            echo " >
\t\t\t";
        }
        // line 89
        echo "\t\t";
    }

    // line 93
    public function block_galleryTypeBlock($context, array $blocks = array())
    {
        // line 94
        echo "\t\t\t";
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "false")) {
            // line 95
            echo "\t\t\t\t";
            if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "true"))) {
                // line 96
                echo "\t\t\t\t\ticons
\t\t\t\t";
            } else {
                // line 98
                echo "\t\t\t\t\tnone
\t\t\t\t";
            }
            // line 100
            echo "\t\t\t";
        } else {
            // line 101
            echo "\t\t\t\t";
            if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "true"))) {
                // line 102
                echo "\t\t\t\t\t";
                if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "personal", array()) == "true") && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "captionEffect", array()), array(0 => "icons", 1 => "icons-scale", 2 => "icons-sodium-left", 3 => "icons-sodium-top", 4 => "icons-nitrogen-top")))) {
                    // line 103
                    echo "\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "captionEffect", array()), "html", null, true);
                    echo "
\t\t\t\t\t";
                } else {
                    // line 105
                    echo "\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()), "html", null, true);
                    echo "
\t\t\t\t\t";
                }
                // line 107
                echo "\t\t\t\t";
            } else {
                // line 108
                echo "\t\t\t\t\t";
                if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "personal", array()) == "true")) {
                    // line 109
                    echo "\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "captionEffect", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "captionEffect", array()), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()))) : ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()))), "html", null, true);
                    echo "
\t\t\t\t\t";
                } else {
                    // line 111
                    echo "\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()), "html", null, true);
                    echo "
\t\t\t\t\t";
                }
                // line 113
                echo "\t\t\t\t";
            }
            // line 114
            echo "\t\t\t";
        }
        // line 115
        echo "\t\t";
    }

    // line 119
    public function block_figure_attributes($context, array $blocks = array())
    {
        // line 120
        echo "\t\t\tclass=\"grid-gallery-caption
\t\t\t";
        // line 121
        if ((($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "displayFirstPhoto", array()) == "on") && ((isset($context["index"]) ? $context["index"] : null) > 0))) {
            echo " hidden-item ";
        }
        // line 122
        echo "\t\t\t";
        if ((($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "mouse_shadow", array()) == "1") && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "use_shadow", array()) == "1"))) {
            // line 123
            echo "\t\t\t\tshadow-show
\t\t\t";
        }
        // line 125
        echo "\t\t\t";
        if ((($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "mouse_shadow", array()) == "2") && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "use_shadow", array()) == "1"))) {
            // line 126
            echo "\t\t\t\tshadow-hide
\t\t\t";
        }
        // line 127
        echo "\"
\t\t\tdata-grid-gallery-type=\"";
        // line 128
        echo twig_escape_filter($this->env, trim((isset($context["galleryType"]) ? $context["galleryType"] : null)), "html", null, true);
        echo "\"
\t\t\tstyle=\"display:none;";
        // line 129
        echo twig_escape_filter($this->env, trim((isset($context["figureStyle"]) ? $context["figureStyle"] : null)), "html", null, true);
        echo "\"
\t\t\t\t";
        // line 130
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "true")) {
            // line 131
            echo "\t\t\t\t\t";
            ob_start();
            // line 132
            echo "\t\t\t\t\t\t";
            if (twig_in_filter("icons", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()))) {
                // line 133
                echo "\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()), "html", null, true);
                echo "
\t\t\t\t\t\t";
            } else {
                // line 135
                echo "\t\t\t\t\t\t\ticons
\t\t\t\t\t\t";
            }
            // line 137
            echo "\t\t\t\t\t";
            $context["galleryType"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 138
            echo "\t\t\t\t";
        }
        // line 139
        echo "\t\t";
    }

    // line 186
    public function block_image_attributes($context, array $blocks = array())
    {
        // line 187
        echo "\t\t\tsrc=\"";
        echo twig_escape_filter($this->env, (isset($context["previewImgUrl"]) ? $context["previewImgUrl"] : null), "html", null, true);
        echo "\"
\t\t\talt=\"";
        // line 188
        if ((twig_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "alt", array())) || ($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "alt", array()) == " "))) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "title", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "alt", array()), "html", null, true);
        }
        echo "\"
\t\t\ttitle=\"";
        // line 189
        if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "description", array()))) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "description", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "title", array()), "html", null, true);
        }
        echo "\"
\t\t\tdata-description=\"";
        // line 190
        if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "description", array()))) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "description", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "title", array()), "html", null, true);
        }
        echo "\"
\t\t\tdata-caption=\"";
        // line 191
        if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "caption", array()))) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "caption", array()));
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "title", array()));
        }
        echo "\"
\t\t\tdata-title=\"";
        // line 192
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "title", array()), "html", null, true);
        echo "\"
\t\t\tstyle=\"
\t\t\t";
        // line 194
        if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width_unit", array()) == 0) &&  !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width", array())))) {
            // line 195
            echo "\t\t\t\twidth:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width", array()), "html", null, true);
            echo "px;
\t\t\t";
        }
        // line 197
        echo "\t\t\t";
        if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height_unit", array()) == 0) &&  !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height", array())))) {
            // line 198
            echo "\t\t\t\theight:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height", array()), "html", null, true);
            echo "px;
\t\t\t";
        }
        // line 200
        echo "\t\t\t\"
\t\t";
    }

    // line 205
    public function block_figcaption_style($context, array $blocks = array())
    {
        // line 206
        echo "\t\t\t";
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "true"))) {
            // line 207
            echo "\t\t\t\tfont-family:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "font_family", array()), "html", null, true);
            echo ";
\t\t\t\t";
            // line 208
            if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "overlay_enabled", array()) == "true")) {
                // line 209
                echo "\t\t\t\t\tbackground-color:";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "overlay_color", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "overlay_color", array()), "#3498db")) : ("#3498db")), "html", null, true);
                echo ";
\t\t\t\t\theight : 100%;
\t\t\t\t\t";
                // line 212
                echo "\t\t\t\t";
            } else {
                // line 213
                echo "\t\t\t\t\theight : 100%;
\t\t\t\t\tbackground-color: transparent;
\t\t\t\t";
            }
            // line 216
            echo "\t\t\t";
        } else {
            // line 217
            echo "\t\t\t\tcolor:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "foreground", array()), "html", null, true);
            echo ";
\t\t\t\tbackground-color:";
            // line 218
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "background", array()), "html", null, true);
            echo ";
\t\t\t\tfont-size:";
            // line 219
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
            echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
            echo ";
\t\t\t\ttext-align:";
            // line 220
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_align", array()), "html", null, true);
            echo ";
\t\t\t\tfont-family:";
            // line 221
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "font_family", array()), "html", null, true);
            echo ";
\t\t\t\t";
            // line 222
            if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()) == "none") || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "false"))) {
                // line 223
                echo "\t\t\t\t\topacity:1;
\t\t\t\t\tbottom:0;
\t\t\t\t";
            }
            // line 226
            echo "\t\t\t";
        }
        // line 227
        echo "\t\t";
    }

    // line 231
    public function block_figcaption_attributes($context, array $blocks = array())
    {
        // line 232
        echo "\t\t\t";
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "true"))) {
            // line 233
            echo "\t\t\t\tdata-alpha=\"";
            echo twig_escape_filter($this->env, trim((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "overlay_transparency", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "overlay_transparency", array()), 5)) : (5))), "html", null, true);
            echo "\"
\t\t\t";
        }
        // line 235
        echo "\t\t\tdata-alpha=\"";
        echo twig_escape_filter($this->env, trim($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "transparency", array())), "html", null, true);
        echo "\"
\t\t\tstyle=\"";
        // line 236
        echo twig_escape_filter($this->env, trim((isset($context["figcaptionStyle"]) ? $context["figcaptionStyle"] : null)), "html", null, true);
        echo "\"
\t\t";
    }

    // line 243
    public function block_figcaption_wrap($context, array $blocks = array())
    {
        // line 244
        echo "\t\t\t";
        // line 245
        echo "\t\t\t";
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "true"))) {
            // line 246
            echo "\t\t\t\t<div
\t\t\t\t\t\tclass=\"hi-icon-wrap ";
            // line 247
            echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "effect", array()), 0, ((isset($context["length"]) ? $context["length"] : null) - 1)), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "effect", array()), "html", null, true);
            echo "\"
\t\t\t\t\t\tdata-margin=\"";
            // line 248
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "margin", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "margin", array()), 5)) : (5)), "html", null, true);
            echo "\"
\t\t\t\t>
\t\t\t\t\t";
            // line 250
            if (($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "video", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array())))) {
                // line 251
                echo "
\t\t\t\t\t\t";
                // line 252
                ob_start();
                // line 253
                echo "\t\t\t\t\t\t\t";
                if (twig_in_filter("youtu", $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array()))) {
                    // line 254
                    echo "\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array()), (isset($context["youtube"]) ? $context["youtube"] : null)), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 255
                    $context["videoSource"] = "youtube";
                    // line 256
                    echo "\t\t\t\t\t\t\t";
                } elseif (twig_in_filter("vimeo.com", $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array()))) {
                    // line 257
                    echo "\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, (call_user_func_array($this->env->getFilter('preg_replace')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array()), (isset($context["vimeoPattern"]) ? $context["vimeoPattern"] : null), (isset($context["vimeoReplace"]) ? $context["vimeoReplace"] : null))) . "?api=1"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 258
                    $context["videoSource"] = "vimeo";
                    // line 259
                    echo "\t\t\t\t\t\t\t";
                } else {
                    // line 260
                    echo "\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, trim($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array())), "html", null, true);
                    echo "
\t\t\t\t\t\t\t";
                }
                // line 262
                echo "\t\t\t\t\t\t";
                $context["videoUrl"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 263
                echo "
\t\t\t\t\t\t";
                // line 264
                $context["videoIcon"] = ((twig_in_filter("youtu", $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array()))) ? ("icon-youtube") : ("icon-vimeo"));
                // line 265
                echo "
\t\t\t\t\t\t";
                // line 266
                ob_start();
                // line 267
                echo "\t\t\t\t\t\t\tmargin-left:";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "margin", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "margin", array()), 5)) : (5)), "html", null, true);
                echo ";
\t\t\t\t\t\t\tmargin-right:";
                // line 268
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "margin", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "margin", array()), 5)) : (5)), "html", null, true);
                echo ";
\t\t\t\t\t\t";
                $context["iconStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 270
                echo "
\t\t\t\t\t\t<a href=\"";
                // line 271
                echo twig_escape_filter($this->env, trim((isset($context["videoUrl"]) ? $context["videoUrl"] : null)), "html", null, true);
                echo "\"
\t\t\t\t\t\t   data-id=\"gg-";
                // line 272
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "id", array()), "html", null, true);
                echo "\"
\t\t\t\t\t\t   title=\"";
                // line 273
                echo twig_escape_filter($this->env, trim((isset($context["aTitle"]) ? $context["aTitle"] : null)), "html", null, true);
                echo "\"
\t\t\t\t\t\t   class=\"hi-icon gg-video ";
                // line 274
                echo twig_escape_filter($this->env, (isset($context["videoIcon"]) ? $context["videoIcon"] : null), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t";
                // line 275
                if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "2")) {
                    echo " pbox";
                }
                // line 276
                echo "\t\t\t\t\t\t\t\t\t\t\"
\t\t\t\t\t\t   style=\"";
                // line 277
                echo twig_escape_filter($this->env, trim((isset($context["iconStyle"]) ? $context["iconStyle"] : null)), "html", null, true);
                echo "\"
\t\t\t\t\t\t   data-video-source=\"";
                // line 278
                echo twig_escape_filter($this->env, (isset($context["videoSource"]) ? $context["videoSource"] : null), "html", null, true);
                echo "\"
\t\t\t\t\t\t\t\t";
                // line 280
                echo "\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "1")) {
                    // line 281
                    echo "\t\t\t\t\t\t\t\t\tdata-rel=\"prettyPhoto[pp_gal]\"
\t\t\t\t\t\t\t\t";
                } else {
                    // line 283
                    echo "\t\t\t\t\t\t\t\t\t";
                    // line 284
                    echo "\t\t\t\t\t\t\t\t\trel=\"video\"
\t\t\t\t\t\t\t\t\t";
                    // line 286
                    echo "\t\t\t\t\t\t\t\t";
                }
                // line 287
                echo "\t\t\t\t\t\t>
\t\t\t\t\t\t\t";
                // line 289
                echo "\t\t\t\t\t\t</a>
\t\t\t\t\t";
            }
            // line 291
            echo "
\t\t\t\t\t";
            // line 292
            if (($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "external_link", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "external_link", array())))) {
                // line 293
                echo "\t\t\t\t\t\t<a title=\"";
                echo twig_escape_filter($this->env, trim((isset($context["aTitle"]) ? $context["aTitle"] : null)), "html", null, true);
                echo "\" data-id=\"gg-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "id", array()), "html", null, true);
                echo "\" href=\"";
                if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "openByLink", array()) == "on")) {
                    echo " ";
                    echo twig_escape_filter($this->env, (isset($context["prepareImgUrl"]) ? $context["prepareImgUrl"] : null), "html", null, true);
                    echo " ";
                } else {
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "external_link", array()), "html", null, true);
                    echo " ";
                }
                echo " \" target=\"";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "target", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "target", array()), "_self")) : ("_self")), "html", null, true);
                echo "\" class=\"hi-icon icon-link ";
                if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "2") && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "openByLink", array()) == "on"))) {
                    echo "pbox";
                }
                echo "\" style=\"";
                echo twig_escape_filter($this->env, trim((isset($context["iconStyle"]) ? $context["iconStyle"] : null)), "html", null, true);
                echo "\"></a>
\t\t\t\t\t";
            }
            // line 295
            echo "
\t\t\t\t\t";
            // line 296
            if (( !array_key_exists("videoUrl", $context) && ( !$this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "external_link", array(), "any", true, true) || twig_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "external_link", array()))))) {
                // line 297
                echo "\t\t\t\t\t\t<a title=\"";
                echo twig_escape_filter($this->env, trim((isset($context["aTitle"]) ? $context["aTitle"] : null)), "html", null, true);
                echo "\" data-id=\"gg-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "id", array()), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, (isset($context["prepareImgUrl"]) ? $context["prepareImgUrl"] : null), "html", null, true);
                echo "\" class=\"hi-icon icon-fullscreen gg-colorbox";
                if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "2") &&  !array_key_exists("link", $context))) {
                    echo " pbox";
                }
                echo "\" style=\"";
                echo twig_escape_filter($this->env, trim((isset($context["iconStyle"]) ? $context["iconStyle"] : null)), "html", null, true);
                echo "\"
\t\t\t\t\t\t\t\t";
                // line 298
                if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "1") && ((isset($context["link"]) ? $context["link"] : null) == false))) {
                    // line 299
                    echo "\t\t\t\t\t\t\tdata-rel=\"prettyPhoto[pp_gal]\"
\t\t\t\t\t\t\t\t";
                }
                // line 300
                echo ">Open in pop-up window</a>
\t\t\t\t\t";
            }
            // line 302
            echo "\t\t\t\t</div>
\t\t\t";
        }
        // line 304
        echo "
\t\t\t";
        // line 305
        if (( !$this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "false"))) {
            // line 306
            echo "\t\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "true")) {
                // line 307
                echo "\t\t\t\t\t";
                if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "caption", array()))) {
                    // line 308
                    echo "\t\t\t\t\t\t<div class=\"gg-image-caption fitvidsignore\" style=\"font-size:";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
                    echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
                    echo ";\">
\t\t\t\t\t\t\t<object type=\"none/none\">
\t\t\t\t\t\t\t\t";
                    // line 310
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "caption", array()), "html", null, true);
                    echo "
\t\t\t\t\t\t\t</object>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 314
                echo "\t\t\t\t";
            }
            // line 315
            echo "\t\t\t";
        }
        // line 316
        echo "\t\t";
    }

    // line 320
    public function block_figcaption_after($context, array $blocks = array())
    {
        // line 321
        echo "\t\t\t";
        if ((($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "true")) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "true"))) {
            // line 322
            echo "
\t\t\t\t";
            // line 323
            ob_start();
            // line 324
            echo "\t\t\t\t\tcolor:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "foreground", array()), "html", null, true);
            echo ";
\t\t\t\t\tbackground-color:";
            // line 325
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "background", array()), "html", null, true);
            echo ";
\t\t\t\t\tfont-size:";
            // line 326
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
            echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
            echo ";
\t\t\t\t\tfont-family:";
            // line 327
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "font_family", array()), "html", null, true);
            echo ";
\t\t\t\t\t";
            // line 328
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_align", array()) != 3)) {
                // line 329
                echo "\t\t\t\t\t\ttext-align:";
                echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_align", array()), array(0 => "left", 1 => "right", 2 => "center")), "html", null, true);
                echo ";
\t\t\t\t\t";
            }
            // line 331
            echo "\t\t\t\t\t";
            if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()) == "none") || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "false"))) {
                // line 332
                echo "\t\t\t\t\t\topacity:1;
\t\t\t\t\t\tbottom:0;
\t\t\t\t\t";
            }
            // line 335
            echo "\t\t\t\t\tvertical-align:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "position", array()), "html", null, true);
            echo ";
\t\t\t\t";
            $context["captionStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 337
            echo "
\t\t\t\t";
            // line 338
            if (( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "caption", array())) || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "tooltip", array()) == "false"))) {
                // line 339
                echo "\t\t\t\t\t<div
\t\t\t\t\t\t\tclass=\"caption-with-";
                // line 340
                if (twig_in_filter("icons", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()))) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()), "html", null, true);
                } else {
                    echo "icons";
                }
                echo "\"
\t\t\t\t\t\t\tstyle=\"";
                // line 341
                echo twig_escape_filter($this->env, (isset($context["captionStyle"]) ? $context["captionStyle"] : null), "html", null, true);
                echo "\"
\t\t\t\t\t\t\tdata-alpha=\"";
                // line 342
                echo twig_escape_filter($this->env, trim($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "transparency", array())), "html", null, true);
                echo "\">
\t\t\t\t\t\t<div style=\"display: table; height:100%; width:100%;\">
\t\t\t\t\t\t\t";
                // line 344
                if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "caption", array()))) {
                    // line 345
                    echo "\t\t\t\t\t\t\t\t<span style=\"padding: 10px;display:table-cell;font-size:";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
                    echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
                    echo "; font-weight: 800;
\t\t\t\t\t\t\t\t\t\tvertical-align:";
                    // line 346
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "position", array()), "html", null, true);
                    echo ";\">
\t\t\t\t\t\t\t\t\t";
                    // line 347
                    echo $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "caption", array());
                    echo "
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t";
                } else {
                    // line 350
                    echo "\t\t\t\t\t\t\t\t<span style=\"padding: 10px;display:table-cell;font-size:";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
                    echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
                    echo ";
\t\t\t\t\t\t\t\t\t\tvertical-align:";
                    // line 351
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "position", array()), "html", null, true);
                    echo ";\">
\t\t\t\t\t\t\t\t\t";
                    // line 352
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "title", array()), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t";
                }
                // line 355
                echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 358
            echo "\t\t\t";
        }
        // line 359
        echo "\t\t";
    }

    // line 363
    public function block_figure_after($context, array $blocks = array())
    {
        // line 364
        echo "\t\t\t";
        if (( !$this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "false"))) {
            // line 365
            echo "\t\t\t\t</a>
\t\t\t";
        }
        // line 367
        echo "\t\t";
    }

    // line 370
    public function block_oneGalleryImage($context, array $blocks = array())
    {
        // line 371
        echo "\t\t";
        echo twig_escape_filter($this->env, (isset($context["var_figure_before"]) ? $context["var_figure_before"] : null), "html", null, true);
        echo "
\t\t<FIGURE ";
        // line 372
        echo twig_escape_filter($this->env, (isset($context["var_figure_attributes"]) ? $context["var_figure_attributes"] : null), "html", null, true);
        echo " >
\t\t\t<div class=\"crop
\t\t\t\t";
        // line 374
        if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "shadow", array()), "overlay", array()) == "1") && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "use_shadow", array()) == "1"))) {
            // line 375
            echo "\t\t\t\t\timage-overlay
\t\t\t\t";
        }
        // line 376
        echo "\"
\t\t\t\t style=\"
\t\t\t\t ";
        // line 378
        if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == "0") || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == "3"))) {
            // line 379
            echo "\t\t\t\t\t\t width:";
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width", array()) . twig_replace_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
            echo ";
\t\t\t\t\t\t height:";
            // line 380
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height", array()) . twig_replace_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
            echo ";
\t\t\t\t\t\t overflow:hidden;
\t\t\t\t ";
        }
        // line 382
        echo "\">

\t\t\t\t<img ";
        // line 384
        echo twig_escape_filter($this->env, (isset($context["var_image_attributes"]) ? $context["var_image_attributes"] : null), "html", null, true);
        echo " />
\t\t\t</div>
\t\t\t<FIGCAPTION ";
        // line 386
        echo twig_escape_filter($this->env, (isset($context["var_figcaption_attributes"]) ? $context["var_figcaption_attributes"] : null), "html", null, true);
        echo "\t>
\t\t\t\t<div
\t\t\t\t\t\tclass=\"grid-gallery-figcaption-wrap\"
\t\t\t\t\t\tstyle=\"
\t\t\t\t\t\t";
        // line 390
        if (( !$this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "false"))) {
            // line 391
            echo "\t\t\t\t\t\t\t\tvertical-align:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "position", array()), "html", null, true);
            echo ";
\t\t\t\t\t\t";
        }
        // line 392
        echo "\">
\t\t\t\t\t";
        // line 393
        echo twig_escape_filter($this->env, (isset($context["var_figcaption_wrap"]) ? $context["var_figcaption_wrap"] : null), "html", null, true);
        echo "
\t\t\t\t</div>
\t\t\t</FIGCAPTION>
\t\t\t";
        // line 396
        echo twig_escape_filter($this->env, (isset($context["var_figcaption_after"]) ? $context["var_figcaption_after"] : null), "html", null, true);
        echo "
\t\t</FIGURE>
\t\t";
        // line 398
        echo twig_escape_filter($this->env, (isset($context["var_figure_after"]) ? $context["var_figure_after"] : null), "html", null, true);
        echo "
\t";
    }

    public function getTemplateName()
    {
        return "@galleries/shortcode/helpers.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1255 => 398,  1250 => 396,  1244 => 393,  1241 => 392,  1235 => 391,  1233 => 390,  1226 => 386,  1221 => 384,  1217 => 382,  1211 => 380,  1206 => 379,  1204 => 378,  1200 => 376,  1196 => 375,  1194 => 374,  1189 => 372,  1184 => 371,  1181 => 370,  1177 => 367,  1173 => 365,  1170 => 364,  1167 => 363,  1163 => 359,  1160 => 358,  1155 => 355,  1149 => 352,  1145 => 351,  1139 => 350,  1133 => 347,  1129 => 346,  1123 => 345,  1121 => 344,  1116 => 342,  1112 => 341,  1104 => 340,  1101 => 339,  1099 => 338,  1096 => 337,  1090 => 335,  1085 => 332,  1082 => 331,  1076 => 329,  1074 => 328,  1070 => 327,  1065 => 326,  1061 => 325,  1056 => 324,  1054 => 323,  1051 => 322,  1048 => 321,  1045 => 320,  1041 => 316,  1038 => 315,  1035 => 314,  1028 => 310,  1021 => 308,  1018 => 307,  1015 => 306,  1013 => 305,  1010 => 304,  1006 => 302,  1002 => 300,  998 => 299,  996 => 298,  979 => 297,  977 => 296,  974 => 295,  946 => 293,  944 => 292,  941 => 291,  937 => 289,  934 => 287,  931 => 286,  928 => 284,  926 => 283,  922 => 281,  919 => 280,  915 => 278,  911 => 277,  908 => 276,  904 => 275,  900 => 274,  896 => 273,  890 => 272,  886 => 271,  883 => 270,  878 => 268,  873 => 267,  871 => 266,  868 => 265,  866 => 264,  863 => 263,  860 => 262,  854 => 260,  851 => 259,  849 => 258,  844 => 257,  841 => 256,  839 => 255,  834 => 254,  831 => 253,  829 => 252,  826 => 251,  824 => 250,  819 => 248,  813 => 247,  810 => 246,  807 => 245,  805 => 244,  802 => 243,  796 => 236,  791 => 235,  785 => 233,  782 => 232,  779 => 231,  775 => 227,  772 => 226,  767 => 223,  765 => 222,  761 => 221,  757 => 220,  752 => 219,  748 => 218,  743 => 217,  740 => 216,  735 => 213,  732 => 212,  726 => 209,  724 => 208,  719 => 207,  716 => 206,  713 => 205,  708 => 200,  702 => 198,  699 => 197,  693 => 195,  691 => 194,  686 => 192,  678 => 191,  670 => 190,  662 => 189,  654 => 188,  649 => 187,  646 => 186,  642 => 139,  639 => 138,  636 => 137,  632 => 135,  626 => 133,  623 => 132,  620 => 131,  618 => 130,  614 => 129,  610 => 128,  607 => 127,  603 => 126,  600 => 125,  596 => 123,  593 => 122,  589 => 121,  586 => 120,  583 => 119,  579 => 115,  576 => 114,  573 => 113,  567 => 111,  561 => 109,  558 => 108,  555 => 107,  549 => 105,  543 => 103,  540 => 102,  537 => 101,  534 => 100,  530 => 98,  526 => 96,  523 => 95,  520 => 94,  517 => 93,  513 => 89,  507 => 87,  504 => 86,  501 => 85,  495 => 69,  490 => 68,  487 => 67,  480 => 80,  476 => 78,  473 => 77,  467 => 75,  463 => 73,  461 => 72,  456 => 71,  454 => 67,  446 => 66,  439 => 65,  436 => 64,  431 => 370,  428 => 369,  425 => 368,  422 => 363,  420 => 362,  417 => 361,  414 => 360,  411 => 320,  409 => 319,  406 => 318,  403 => 317,  400 => 243,  398 => 242,  395 => 241,  393 => 240,  390 => 239,  387 => 238,  384 => 231,  382 => 230,  379 => 229,  376 => 228,  373 => 205,  371 => 204,  368 => 203,  365 => 202,  362 => 186,  360 => 185,  357 => 184,  354 => 183,  351 => 182,  348 => 181,  345 => 180,  343 => 179,  340 => 178,  337 => 177,  334 => 176,  332 => 175,  329 => 174,  326 => 173,  323 => 172,  321 => 171,  318 => 170,  315 => 169,  312 => 168,  310 => 167,  307 => 166,  304 => 165,  302 => 164,  300 => 163,  298 => 162,  296 => 161,  294 => 160,  291 => 159,  289 => 158,  286 => 157,  283 => 156,  281 => 155,  278 => 154,  275 => 153,  272 => 152,  269 => 151,  266 => 150,  263 => 149,  260 => 148,  258 => 147,  255 => 146,  252 => 145,  250 => 144,  247 => 143,  245 => 142,  242 => 141,  239 => 140,  236 => 119,  234 => 118,  231 => 117,  228 => 116,  225 => 93,  223 => 92,  220 => 91,  217 => 90,  214 => 85,  212 => 84,  209 => 83,  206 => 82,  203 => 64,  201 => 63,  198 => 62,  196 => 61,  193 => 60,  188 => 57,  185 => 56,  179 => 54,  176 => 53,  174 => 52,  171 => 51,  164 => 48,  161 => 47,  159 => 46,  154 => 45,  151 => 44,  149 => 43,  146 => 42,  141 => 39,  139 => 38,  136 => 37,  132 => 35,  130 => 34,  127 => 33,  123 => 31,  120 => 30,  118 => 29,  115 => 28,  108 => 25,  102 => 23,  99 => 22,  97 => 21,  94 => 20,  87 => 17,  83 => 15,  80 => 14,  74 => 12,  71 => 11,  68 => 9,  65 => 8,  53 => 7,  51 => 6,  46 => 5,  36 => 3,  33 => 2,  31 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@galleries/shortcode/helpers.twig", "D:\\Projects\\Git\\php\\NhaDat\\wordpress\\wp-content\\plugins\\gallery-by-supsystic\\src\\GridGallery\\Galleries\\views\\shortcode\\helpers.twig");
    }
}
