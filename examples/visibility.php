<?php


class A
{
    static $myStatic = "I'm a static property<br>"; // class scope but not object scope
    const myConstant = "I'm a constant<br>"; // unchangeable

    public $myPublic = "public: visible to everyone, can be changed<br>";
    protected $myProtected = "protected: visible only to inheriting class, can be changed<br>";
    private $myPrivate = "private: invisible outside of class<br>";

    public function __construct()
    {
        echo $this->myPublic;
        echo $this->myProtected;
        echo $this->myPrivate;
        echo self::myConstant;
    }
}

echo A::$myStatic;

$a = new A();

echo $a->myPublic; // visible to everyone, can be changed
//echo $a->myProtected; // FATAL
//echo $a->myPrivate; // FATAL
