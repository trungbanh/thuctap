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

/* User/detailuser.html.twig */
class __TwigTemplate_cc13d633d96e1480a2b1985a1732a28039446fa186a6d2168d2d9b2dccba19ce extends \Twig\Template
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
        return "layout/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout/base.html.twig", "User/detailuser.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    ";
        $context["user"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "session", [], "any", false, false, false, 4), "getUser", [], "method", false, false, false, 4);
        // line 5
        echo "    <div class=\"updatebox row\">
        <form id=\"detail\" enctype=\"multipart/form-data\">
            <input name=\"idAuthor\" type=\"hidden\" value=\"";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getIdAuthor", [], "method", false, false, false, 7), "html", null, true);
        echo "\" >
            <div class=\"form-group\">
                <label for=\"nickname\" >Tên:  </label>
                <input id=\"nickname\" name=\"nickname\" type=\"text\" value=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getNickname", [], "method", false, false, false, 10), "html", null, true);
        echo "\" >
                <p class=\"error\" id=\"namee\"></p>
            </div>
            <div class=\"form-group\">
                <label for=\"mail\" >Email: </label>
                <input id=\"mail\" name=\"mail\" type=\"text\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getMail", [], "method", false, false, false, 15), "html", null, true);
        echo "\" required=\"required\"> 
                <p class=\"error\" id=\"maile\"></p>
            </div>
            <div class=\"form-group\">
                <label for=\"passold\" >Mật khẩu cũ : </label>
                <input name=\"passold\" id=\"passold\" type=\"password\" value=\"trungne\" >
                <p class=\"error\" id=\"passolde\"></p>
             </div>
            <div class=\"form-group\">
                <label for=\"passnew\" >Mật khẩu mới : </label>
                <input name=\"passnew\" id=\"passnew\" type=\"password\" value=\"trungne\" >
                <p class=\"error\" id=\"passnewe\"></p>
            </div>
            <div class=\"form-group\">
                <label for=\"passre\" >Mật khẩu mới nhập lại : </label>
                <input name=\"passre\" id=\"passre\" type=\"password\" value=\"trungne\">
                <p class=\"error\" id=\"passree\"></p>
            </div>
            
            <button id=\"updatedetail\" name=\"update\" >Cập nhập</button>
        </form>
    </div>

    <script >
        \$().ready(function(){
            \$.validator.addMethod(\"regex\",function(value,element,regexp) {
                return this.optional(element) || regexp.test(value)
            }, \"mail không hợp lệ\");

            var \$detail = \$(\"#detail\");
            \$detail.validate({
                rules: {
                    nickname:{
                        required:true,
                        minlength:2,
                        maxlength:25,
                    },
                    mail: {
                        required:true,
                        email:true,
                        regex: /^[_a-z0-9-]+(\\.[_a-z0-9-]+)*@trung\\.com\$/,
                    },
                    passold: {
                        required: true,
                    },
                    passnew:{
                        // không bắt buộc thay đổi mật khẩu 
                        minlength: 5
                    },
                    passre :{
                        equalTo: \"#passnew\"
                    }
                },
                messages: {
                    nickname: {
                        required:\"chưa nhập nickname\",
                        minlength:\"tên phải nhiều hơn 2 ký tự và không quá 25 ký tự\",
                        maxlength:\"tên phải nhiều hơn 2 ký tự và không quá 25 ký tự\",
                    },
                    mail: {
                        required:\"không để mục trống \",
                        email:\"bắt buộc nhập mail\",
                    },
                    passold: {
                        required: \"nhập mật khẩu\",
                    },
                    passnew:{
                        minlength: \"độ dài tối thiểu là 5\"
                    },
                    passre :{
                        equalTo: \"xác thực không khớp\"
                    }
                }
            });

            \$(\"#updatedetail\").on(\"click\",function(event){
                event.preventDefault();
                if (\$detail.valid()){
                    \$.ajax({
                        type : 'POST',
                        url : '/author/update/detail',
                        data : \$(\"#detail\").serialize(),
                        success: function(data) {
                            let result = JSON.parse(data);
                            if (typeof(result) === 'object') {
                                if (result.data) {
                                    window.location=\"/blogs\";
                                } else if (typeof(result.error) === 'object'){
                                    if (result.error.passold) {
                                        \$(\"#passolde\").html(result.error.passold);
                                    } else if (result.error.nickname) {
                                        \$(\"#nicknamee\").html(result.error.nickname);
                                    } else if (result.error.mail) {
                                        \$(\"#maile\").html(result.error.mail);
                                    } else {
                                        \$(\"#passree\").html(result.error.passre);
                                    }
                                }
                            }
                        }
                    });
                }
                return false;
            });
        });
    </script>

";
    }

    public function getTemplateName()
    {
        return "User/detailuser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 15,  63 => 10,  57 => 7,  53 => 5,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout/base.html.twig' %}

{% block body %}
    {% set user = App.session.getUser() %}
    <div class=\"updatebox row\">
        <form id=\"detail\" enctype=\"multipart/form-data\">
            <input name=\"idAuthor\" type=\"hidden\" value=\"{{user.getIdAuthor()}}\" >
            <div class=\"form-group\">
                <label for=\"nickname\" >Tên:  </label>
                <input id=\"nickname\" name=\"nickname\" type=\"text\" value=\"{{user.getNickname()}}\" >
                <p class=\"error\" id=\"namee\"></p>
            </div>
            <div class=\"form-group\">
                <label for=\"mail\" >Email: </label>
                <input id=\"mail\" name=\"mail\" type=\"text\" value=\"{{ user.getMail()}}\" required=\"required\"> 
                <p class=\"error\" id=\"maile\"></p>
            </div>
            <div class=\"form-group\">
                <label for=\"passold\" >Mật khẩu cũ : </label>
                <input name=\"passold\" id=\"passold\" type=\"password\" value=\"trungne\" >
                <p class=\"error\" id=\"passolde\"></p>
             </div>
            <div class=\"form-group\">
                <label for=\"passnew\" >Mật khẩu mới : </label>
                <input name=\"passnew\" id=\"passnew\" type=\"password\" value=\"trungne\" >
                <p class=\"error\" id=\"passnewe\"></p>
            </div>
            <div class=\"form-group\">
                <label for=\"passre\" >Mật khẩu mới nhập lại : </label>
                <input name=\"passre\" id=\"passre\" type=\"password\" value=\"trungne\">
                <p class=\"error\" id=\"passree\"></p>
            </div>
            
            <button id=\"updatedetail\" name=\"update\" >Cập nhập</button>
        </form>
    </div>

    <script >
        \$().ready(function(){
            \$.validator.addMethod(\"regex\",function(value,element,regexp) {
                return this.optional(element) || regexp.test(value)
            }, \"mail không hợp lệ\");

            var \$detail = \$(\"#detail\");
            \$detail.validate({
                rules: {
                    nickname:{
                        required:true,
                        minlength:2,
                        maxlength:25,
                    },
                    mail: {
                        required:true,
                        email:true,
                        regex: /^[_a-z0-9-]+(\\.[_a-z0-9-]+)*@trung\\.com\$/,
                    },
                    passold: {
                        required: true,
                    },
                    passnew:{
                        // không bắt buộc thay đổi mật khẩu 
                        minlength: 5
                    },
                    passre :{
                        equalTo: \"#passnew\"
                    }
                },
                messages: {
                    nickname: {
                        required:\"chưa nhập nickname\",
                        minlength:\"tên phải nhiều hơn 2 ký tự và không quá 25 ký tự\",
                        maxlength:\"tên phải nhiều hơn 2 ký tự và không quá 25 ký tự\",
                    },
                    mail: {
                        required:\"không để mục trống \",
                        email:\"bắt buộc nhập mail\",
                    },
                    passold: {
                        required: \"nhập mật khẩu\",
                    },
                    passnew:{
                        minlength: \"độ dài tối thiểu là 5\"
                    },
                    passre :{
                        equalTo: \"xác thực không khớp\"
                    }
                }
            });

            \$(\"#updatedetail\").on(\"click\",function(event){
                event.preventDefault();
                if (\$detail.valid()){
                    \$.ajax({
                        type : 'POST',
                        url : '/author/update/detail',
                        data : \$(\"#detail\").serialize(),
                        success: function(data) {
                            let result = JSON.parse(data);
                            if (typeof(result) === 'object') {
                                if (result.data) {
                                    window.location=\"/blogs\";
                                } else if (typeof(result.error) === 'object'){
                                    if (result.error.passold) {
                                        \$(\"#passolde\").html(result.error.passold);
                                    } else if (result.error.nickname) {
                                        \$(\"#nicknamee\").html(result.error.nickname);
                                    } else if (result.error.mail) {
                                        \$(\"#maile\").html(result.error.mail);
                                    } else {
                                        \$(\"#passree\").html(result.error.passre);
                                    }
                                }
                            }
                        }
                    });
                }
                return false;
            });
        });
    </script>

{% endblock %}
", "User/detailuser.html.twig", "/home/dr-trange/Code/PHP/blog/View/User/detailuser.html.twig");
    }
}
