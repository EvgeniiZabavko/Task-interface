<!-- 
Создать интерфейс DocumentInterface, который определяет общие методы для всех типов документов, 
а также дополнительный метод process(), который будет выводить текст, что данный тип обрабатывается. 
А также getInfo(), который будет выводить массив данных содержащий информацию

Создать класс TextDocument, который реализует интерфейс DocumentInterface и 
содержит специфические методы и параметры для текстовых документов. 
Данный класс должен содержать методы getTitle(), getDescription(), process(), getInfo(), 
а также специфический метод getWordCount().

Создать класс ImageDocument, который также реализует интерфейс DocumentInterface 
и содержит специфические методы и параметры для изображений. 
Данный класс должен содержать методы getTitle(), getDescription(), process(), 
а также специфический метод getDimensions(), getInfo(), 
в котором будет отображаться ширина и высота видео.

Создать класс VideoDocument, который также реализует интерфейс DocumentInterface 
и содержит специфические методы и параметры для видео. 
Данный класс должен содержать методы getTitle(), getDescription(), process(), getInfo(), 
а также специфический метод getDuration(), в котором будет отображаться длительность видео.

Создать объекты классов TextDocument, ImageDocument и VideoDocument.
Вызвать метод process() на каждом из объектов классов, 
чтобы обработать соответствующий тип документа.
Получить специфические параметры каждого типа документа, 
вызвав соответствующие методы классов TextDocument, ImageDocument и VideoDocument.
Опционально: добавить новый тип документа, создав соответствующий класс и реализовав интерфейс DocumentInterface. -->


<?php

interface DocumentInterface{
    public function getTitle();
    public function getDescription();
    public function process();
    public function getInfo();
}

class ImageDocument implements DocumentInterface{
    private string $title;
    private string $discription;
    private float $hight;
    private float $width;

    public function __construct(string $title, string $discription, float $hight, float $width,){
        $this->title = $title;
        $this->discription = $discription;
        $this->hight = $hight;
        $this->width = $width;
    }
    public function setTitle(string $title){
        $this->title = $title;
    }
    public function setDescription(string $discription){
        $this->discription = $discription;
    }
    public function setHight(string $hight){
        $this->hight = $hight;
    }
    public function setWidth(string $width){
        $this->width = $width;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getDescription(){
        return $this->discription;
    }
    public function getHight(){
        return $this->hight;
    }
    public function getWidth(){
        return $this->width;
    }
    public function getDimensions(){
        return 'Hight: ' . $this->getHight() . 'px; Width: ' . $this->getWidth() . 'px';
    }
    public function process(){
        return $this->getTitle() . "loading";
    }
    public function getInfo(){
        return ['title' => $this->getTitle(),
                'discription' => $this->getDescription(), 
                'dimensions' => $this->getDimensions(),];
    }
}
$imageDocument = new ImageDocument('Image', 'Mazda', 100, 300);
print_r($imageDocument->getInfo());

class TextDocument implements DocumentInterface{
    private string $title;
    private string $discription;

    public function __construct(string $title, string $discription,){
    $this->title = $title;
    $this->discription = $discription;
    }
    public function setTitle(string $title){
    $this->title = $title;
    }
    public function setDescription(string $discription){
    $this->discription = $discription;
    }

    public function getTitle(){
        return $this->title;    
    }
    public function getDescription(){
        return $this->discription;
    }
    public function getWordCount(){
        return str_word_count($this->title, 2);
    }
    public function process(){
        return $this->getTitle() . "loading";
    }
    public function getInfo(){
        return ['title' => $this->getTitle(),
            'discription' => $this->getDescription(), 
            'wordСount' => $this->getWordCount(),];
        }
}
$textDocument = new TextDocument('Why interfaces are needed', 'Интерфейсы объектов позволяют создавать код, который ...');
print_r($textDocument->getInfo());

class VideoDocument implements DocumentInterface{
    private string $title;
    private string $discription;
    private string $duration;

    public function __construct(string $title, string $discription, string $duration,){
    $this->title = $title;
    $this->discription = $discription;
    $this->duration = $duration;
    }
    public function setTitle(string $title){
    $this->title = $title;
    }
    public function setDescription(string $discription){
    $this->discription = $discription;
    }
    public function setDuration(string $duration){
        $this->duration = $duration;
    }
    public function getTitle(){
        return $this->title;    
    }
    public function getDescription(){
        return $this->discription;
    }
    public function getDuration(){
        return $this->duration . 'min';
    }
    public function process(){
        return $this->getTitle() . "loading";
    }
    public function getInfo(){
        return ['title' => $this->getTitle(),
            'discription' => $this->getDescription(), 
            'duration' => $this->getDuration(),];
        }
}
$videoDocument = new VideoDocument('Video', 'Трансформеры', 144);
print_r($videoDocument->getInfo());

