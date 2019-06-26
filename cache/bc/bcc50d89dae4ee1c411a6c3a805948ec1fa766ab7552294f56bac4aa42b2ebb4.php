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

/* User/logon.html.twig */
class __TwigTemplate_165dafb935ec5ca91aae08f99f47441ee80596a13ccad5008842f4efc877d21c extends \Twig\Template
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
        $this->parent = $this->loadTemplate("layout/base.html.twig", "User/logon.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
<div class=\"updatebox row\">

    <form class=\"col-6\" id=\"loginform\" enctype=\"multipart/form-data\">
        <h3 class=\"error\" id=\"loginforme\"></h3>
        <div class=\"form-group\">
            <label for=\"mail1\">Mail</label> 
            <input type=\"text\" name=\"mail\" id=\"mail1\" value=\"tuido@trung.com\">
            <p class=\"error\" id=\"mail1e\"></p>
        </div>
        <div class=\"form-group\">
            <label for=\"pass1\">Mật khẩu</label>
            <input type=\"password\" name=\"pass\" id=\"pass1\" value=\"tuido1\">
            <p class=\"error\" id=\"pass1e\"></p>
        </div>
        <button id=\"loginbtn\" name=\"login\" >Đăng Nhập</button>
    </form>

    <form class=\"col-6\" id=\"signform\" enctype=\"multipart/form-data\">
        <div class=\"form-group\">
            <label for=\"nickname\">Tên tài khoản</label>
            <input type=\"text\" name=\"nickname\" id=\"nickname\" value=\"trung\">
            <p class=\"error\" id=\"nicknamee\"></p>
        </div>
        <div class=\"form-group\">
            <label for=\"mail\">Mail (chỉ nhận mail từ @trung.com)</label>
            <input type=\"text\" name=\"mail\" id=\"mail\" value=\"trung@trung.com\">
            <p class=\"error\" id=\"maile\"></p>
        </div>
        <div class=\"form-group\">
            <label for=\"pass\">Mật khẩu </label>
            <input type=\"password\" name=\"pass\" id=\"pass\" value=\"trungne\" minlength=\"5\">
            <p class=\"error\" id=\"passe\"></p>
        </div>
        <div class=\"form-group\">
            <label for=\"passre\">Nhập lại mật khẩu</label>
            <input type=\"password\" name=\"passre\" id=\"passre\" value=\"trungne\">
            <p class=\"error\" id=\"pwre\"></p>
        </div>
        <button id=\"signinbtn\" name=\"signin\" >Đăng Ký</button> 
    </form>
</div>
<script >
    \$().ready(function() {

        \$.validator.addMethod(\"regex\",function(value,element,regexp) {
                return this.optional(element) || regexp.test(value)
            }, \"mail không hợp lệ\");

        var \$loginform = \$(\"#loginform\");
        \$loginform.validate({
            rules: {
                mail: {
                    required:true,
                    email:true,
                    regex: /^[_a-z0-9-]+(\\.[_a-z0-9-]+)*@(trung.com)\$/,
                },
                pass: {
                    required: true,
                    minlength: 5
                },
            },
            messages: {
                mail: {
                    required:\"nhập mail\",
                    email:\"mail chỉ chấp nhận @trung.com\",
                },
                pass: {
                    required: \"nhập mật khẩu\",
                    minlength: \"độ dài tối thiểu là 5\"
                }
            }
        });

        var \$signform = \$(\"#signform\");
        \$signform.validate({
            rules: {
                name: {
                    required:true,
                },
                mail: {
                    required:true,
                    email:true,
                    regex: /^[_a-z0-9-]+(\\.[_a-z0-9-]+)*@(trung.com)\$/,
                },
                pass: {
                    required: true,
                    minlength: 5
                },
                passre: {
                    required:true,
                    equalTo: \"#pass\"
                }
            },
            messages: {
                name: {
                    required:\"chưa nhập tên\",
                },
                mail: {
                    required:\"chưa nhập mail\",
                    email:\"mail chỉ chấp nhận @trung.com\",
                },
                pass: {
                    required: \"nhập mật khẩu\",
                    minlength: \"độ dài tối thiểu là 5\"
                },
                passre: {
                    required: \"chưa xác nhận lại\",
                    equalTo: \"xác nhận không khớp mật khẩu\"
                }
            }
        });

        \$(\"#loginbtn\").on(\"click\",function(e){
            e.preventDefault();

            if (\$loginform.valid()) {
                \$.ajax({
                    type : 'PATCH',
                    url : '/author',
                    data : \$(\"#loginform\").serialize(),
                    success: function(data) {
                        if (data) {
                            let result = JSON.parse(data);
                            if (typeof result.error === 'object') {
                                if (result.error.mail){
                                    \$(\"#mail1e\").html(result.error.mail);
                                }
                                if (result.error.pass){
                                    \$(\"#pass1e\").html(result.error.pass);
                                }
                            } else if (result.data)  {
                                window.location=\"/blogs\";
                            } else {
                                \$(\"#loginforme\").html(\"sai email hoặc mật khẩu\");
                            }
                        }
                    }
                });
            }
            
            return false;
        });

        \$(\"#signinbtn\").on(\"click\",function(e){
            e.preventDefault();

            if (\$signform.valid()) {
                \$.ajax({
                    type : 'PUT',
                    url : '/author',
                    data : \$(\"#signform\").serialize(),
                    success: function(data) {
                        if (data) {
                            let result = JSON.parse(data);
                            if (result.error) {
                                if (result.error.nickname) {
                                    \$(\"#nicknamee\").text(result.error.nickname);
                                } else if (result.error.mail) {
                                    \$(\"#maile\").text(result.error.mail);
                                } else {
                                    \$(\"#passe\").text(result.error.pass);
                                }
                            } else {
                                window.location=\"/blogs\";
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
        return "User/logon.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout/base.html.twig' %}

{% block body %}

<div class=\"updatebox row\">

    <form class=\"col-6\" id=\"loginform\" enctype=\"multipart/form-data\">
        <h3 class=\"error\" id=\"loginforme\"></h3>
        <div class=\"form-group\">
            <label for=\"mail1\">Mail</label> 
            <input type=\"text\" name=\"mail\" id=\"mail1\" value=\"tuido@trung.com\">
            <p class=\"error\" id=\"mail1e\"></p>
        </div>
        <div class=\"form-group\">
            <label for=\"pass1\">Mật khẩu</label>
            <input type=\"password\" name=\"pass\" id=\"pass1\" value=\"tuido1\">
            <p class=\"error\" id=\"pass1e\"></p>
        </div>
        <button id=\"loginbtn\" name=\"login\" >Đăng Nhập</button>
    </form>

    <form class=\"col-6\" id=\"signform\" enctype=\"multipart/form-data\">
        <div class=\"form-group\">
            <label for=\"nickname\">Tên tài khoản</label>
            <input type=\"text\" name=\"nickname\" id=\"nickname\" value=\"trung\">
            <p class=\"error\" id=\"nicknamee\"></p>
        </div>
        <div class=\"form-group\">
            <label for=\"mail\">Mail (chỉ nhận mail từ @trung.com)</label>
            <input type=\"text\" name=\"mail\" id=\"mail\" value=\"trung@trung.com\">
            <p class=\"error\" id=\"maile\"></p>
        </div>
        <div class=\"form-group\">
            <label for=\"pass\">Mật khẩu </label>
            <input type=\"password\" name=\"pass\" id=\"pass\" value=\"trungne\" minlength=\"5\">
            <p class=\"error\" id=\"passe\"></p>
        </div>
        <div class=\"form-group\">
            <label for=\"passre\">Nhập lại mật khẩu</label>
            <input type=\"password\" name=\"passre\" id=\"passre\" value=\"trungne\">
            <p class=\"error\" id=\"pwre\"></p>
        </div>
        <button id=\"signinbtn\" name=\"signin\" >Đăng Ký</button> 
    </form>
</div>
<script >
    \$().ready(function() {

        \$.validator.addMethod(\"regex\",function(value,element,regexp) {
                return this.optional(element) || regexp.test(value)
            }, \"mail không hợp lệ\");

        var \$loginform = \$(\"#loginform\");
        \$loginform.validate({
            rules: {
                mail: {
                    required:true,
                    email:true,
                    regex: /^[_a-z0-9-]+(\\.[_a-z0-9-]+)*@(trung.com)\$/,
                },
                pass: {
                    required: true,
                    minlength: 5
                },
            },
            messages: {
                mail: {
                    required:\"nhập mail\",
                    email:\"mail chỉ chấp nhận @trung.com\",
                },
                pass: {
                    required: \"nhập mật khẩu\",
                    minlength: \"độ dài tối thiểu là 5\"
                }
            }
        });

        var \$signform = \$(\"#signform\");
        \$signform.validate({
            rules: {
                name: {
                    required:true,
                },
                mail: {
                    required:true,
                    email:true,
                    regex: /^[_a-z0-9-]+(\\.[_a-z0-9-]+)*@(trung.com)\$/,
                },
                pass: {
                    required: true,
                    minlength: 5
                },
                passre: {
                    required:true,
                    equalTo: \"#pass\"
                }
            },
            messages: {
                name: {
                    required:\"chưa nhập tên\",
                },
                mail: {
                    required:\"chưa nhập mail\",
                    email:\"mail chỉ chấp nhận @trung.com\",
                },
                pass: {
                    required: \"nhập mật khẩu\",
                    minlength: \"độ dài tối thiểu là 5\"
                },
                passre: {
                    required: \"chưa xác nhận lại\",
                    equalTo: \"xác nhận không khớp mật khẩu\"
                }
            }
        });

        \$(\"#loginbtn\").on(\"click\",function(e){
            e.preventDefault();

            if (\$loginform.valid()) {
                \$.ajax({
                    type : 'PATCH',
                    url : '/author',
                    data : \$(\"#loginform\").serialize(),
                    success: function(data) {
                        if (data) {
                            let result = JSON.parse(data);
                            if (typeof result.error === 'object') {
                                if (result.error.mail){
                                    \$(\"#mail1e\").html(result.error.mail);
                                }
                                if (result.error.pass){
                                    \$(\"#pass1e\").html(result.error.pass);
                                }
                            } else if (result.data)  {
                                window.location=\"/blogs\";
                            } else {
                                \$(\"#loginforme\").html(\"sai email hoặc mật khẩu\");
                            }
                        }
                    }
                });
            }
            
            return false;
        });

        \$(\"#signinbtn\").on(\"click\",function(e){
            e.preventDefault();

            if (\$signform.valid()) {
                \$.ajax({
                    type : 'PUT',
                    url : '/author',
                    data : \$(\"#signform\").serialize(),
                    success: function(data) {
                        if (data) {
                            let result = JSON.parse(data);
                            if (result.error) {
                                if (result.error.nickname) {
                                    \$(\"#nicknamee\").text(result.error.nickname);
                                } else if (result.error.mail) {
                                    \$(\"#maile\").text(result.error.mail);
                                } else {
                                    \$(\"#passe\").text(result.error.pass);
                                }
                            } else {
                                window.location=\"/blogs\";
                            }
                        }
                    }
                });
            }
            return false;
        });
    });

</script>
{% endblock %}", "User/logon.html.twig", "/home/dr-trange/Code/PHP/blog/View/User/logon.html.twig");
    }
}
