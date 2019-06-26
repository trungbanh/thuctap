<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* /Blog/paper.html.twig */
class __TwigTemplate_25e785a51798d39cf73e4ce0c50adea98fa0a1f792e58f3da6849d851521f541 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "/layout/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("/layout/base.html.twig", "/Blog/paper.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
";
        // line 5
        $context["user"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "session", [], "any", false, false, false, 5), "getUser", [], "method", false, false, false, 5);
        // line 6
        echo "    
<div class='row'>
    ";
        // line 8
        if (($context["user"] ?? null)) {
            // line 9
            echo "    <script >
        \$().ready(function(){
            \$(\"#myform\").validate({
                rules: {
                        title: {
                            required:true,
                        },
                        content: {
                            required: true,
                        },
                    },
                messages: {
                    title: {
                        required:\"bài viết cần có tựa đề \"
                        },
                    content: {
                        required: \"bài viết chưa có nội dung\",
                    }
                }
            });
        });

        \$.validator.setDefaults({
            submitHandler: function() {
                \$(\"#myform\").on(\"submit\",function(event){
                    event.preventDefault();
                    \$.ajax({
                        type       : 'PUT',
                        url        : '/blog',
                        data       : \$(\"#myform\").serialize(),
                        success: function() {
                            window.location=\"/blogs\";
                        }
                    });
                    return false;
                });
            }
        });

    </script>
    <div class='form col-9'>
        <form id=\"myform\" enctype='multipart/form-data'> 
            <p> tên bài viết  </p>
            <textarea type=\"text\" name=\"title\" id=\"title\" rows=\"2\" cols=\"35\"  ></textarea> <br> <br>
            <p> nội dung bài viết  </p>
            <textarea type=\"text\" name=\"content\" id=\"content\" rows=\"20\" cols=\"35\" ></textarea> <br> <br>
            <input type=\"submit\" id='target' value=\"tạo bài viết mới\"/>
        </form> 
    </div>
    ";
        } else {
            // line 59
            echo "    <div class='ads'>
        <img src=\"./static/qc.jpeg\" alt=\"quảng cáo\" style='width: 10em;'/>
        <p> quảng cáo  </p>
    </div>
    ";
        }
        // line 64
        echo "</div>
        

";
    }

    public function getTemplateName()
    {
        return "/Blog/paper.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 64,  113 => 59,  61 => 9,  59 => 8,  55 => 6,  53 => 5,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends '/layout/base.html.twig' %}

{% block body %}

{% set user = App.session.getUser() %}
    
<div class='row'>
    {% if (user) %}
    <script >
        \$().ready(function(){
            \$(\"#myform\").validate({
                rules: {
                        title: {
                            required:true,
                        },
                        content: {
                            required: true,
                        },
                    },
                messages: {
                    title: {
                        required:\"bài viết cần có tựa đề \"
                        },
                    content: {
                        required: \"bài viết chưa có nội dung\",
                    }
                }
            });
        });

        \$.validator.setDefaults({
            submitHandler: function() {
                \$(\"#myform\").on(\"submit\",function(event){
                    event.preventDefault();
                    \$.ajax({
                        type       : 'PUT',
                        url        : '/blog',
                        data       : \$(\"#myform\").serialize(),
                        success: function() {
                            window.location=\"/blogs\";
                        }
                    });
                    return false;
                });
            }
        });

    </script>
    <div class='form col-9'>
        <form id=\"myform\" enctype='multipart/form-data'> 
            <p> tên bài viết  </p>
            <textarea type=\"text\" name=\"title\" id=\"title\" rows=\"2\" cols=\"35\"  ></textarea> <br> <br>
            <p> nội dung bài viết  </p>
            <textarea type=\"text\" name=\"content\" id=\"content\" rows=\"20\" cols=\"35\" ></textarea> <br> <br>
            <input type=\"submit\" id='target' value=\"tạo bài viết mới\"/>
        </form> 
    </div>
    {% else %}
    <div class='ads'>
        <img src=\"./static/qc.jpeg\" alt=\"quảng cáo\" style='width: 10em;'/>
        <p> quảng cáo  </p>
    </div>
    {% endif %}
</div>
        

{% endblock %}", "/Blog/paper.html.twig", "/home/dr-trange/Code/PHP/blog/View/Blog/paper.html.twig");
    }
}
