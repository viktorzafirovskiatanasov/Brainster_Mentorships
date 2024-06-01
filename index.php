<?php

abstract class User
{
    protected $firstName;
    protected $lastName;
    protected $username;
    protected $password;
    protected $role;

    public function __construct($firstName, $lastName, $username, $password, $role)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }

    protected function userPrint()
    {
        return "<br/> First name: {$this->firstName}, <br/> Last name: {$this->lastName}, <br/> Username: {$this->username}, <br/> Role: {$this->role} <br/> <br/>";
    }

    abstract protected function login();
    abstract protected function logout();
}

class Member extends User
{
    protected $posts;
    private $authenticated;

    public function __construct($firstName, $lastName, $username, $password)
    {
        parent::__construct($firstName, $lastName, $username, $password, 'MEMBER');
        $this->posts = [];
        $this->authenticated = false;
    }

    public function login()
    {
        $usersFile = __DIR__ . '/users.txt';
        $users = file($usersFile, FILE_IGNORE_NEW_LINES);

        /*if ($users === false) {
            echo "Failed to read user data.";
            return;
        }
        */

        foreach ($users as $user) {
            list($savedUsername, $savedPassword) = explode(":", $user);
            if ($savedPassword === $this->password && $savedUsername === $this->username) {
                $this->authenticated = true;
                break;
            }
        }
    }

    public function isLoggedIn()
    {
        return $this->authenticated;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function logout()
    {
        $this->authenticated = false;
    }

    public function identity()
    {
        return  parent::userPrint() . "Authenticated: " . ($this->authenticated ? 'Yes' : 'No');
    }
}

interface TopicInfo
{
    public function printTopic();
    public function printPosts();
}

class Post
{
    private $createdTime;
    private $category;
    private $title;
    private $text;

    public function __construct($createdTime = '')
    {
        $this->createdTime = date('d-m-y h:i:s'); 
       
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setCategory($category)
    {
        $this->category = $category;
    }
    public function setText($text)
    {
        $this->text = $text;
    }
    public function getTitle()
    {
        return $this->title;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getCreatedTime()
    {
        return $this->createdTime;
    }
}

class Topic implements TopicInfo
{
    private $title;
    private $author;
    private $category;
    private $createdTime;
    private $posts = [];

    public function __construct(Member $author, $title, $category)
    {
        if ($author->getRole() !== 'ADMIN' && !$author->isLoggedIn()) {
            echo "<br/> User: {$author->identity()} is not able to create topic with title: $title <br/>";
            return;
        }

        $this->title = $title;
        $this->author = $author;
        $this->category = $category;
        $this->createdTime = date('d-m-y h:i:s'); // Timestamp of creation
        $this->posts = [];
    }

    public function addPost(Member $author, Post $post)
    {
        if (!$author->isLoggedIn() || $author->getRole() !== 'MEMBER' || $post->getCategory() !== $this->category) {
            echo "User: {$author->identity()} is not able to add a post with title: {$post->getTitle()}";
            return;
        }

        $this->posts[] = ["post" => $post, "author" => $author];
    }

    public function printTopic()
    {
        if ($this->author !== null) {
            return "<br/> Topic {$this->title}, <br/> created by: {$this->author->identity()}, <br/> creation date: {$this->createdTime} <br/>";
        } else {
            return "<br/> Topic {$this->title}, <br/> created by: Unknown Author, <br/> creation date: {$this->createdTime} <br/>";
        }
    }

    public function printPosts()
    {
        $output = "";
        foreach ($this->posts as $postInfo) {
            $post = $postInfo["post"];
            $author = $postInfo["author"];
            $output .= " <br/> Post: {$post->getTitle()}, <br/> created by:  {$author->identity()}, <br/> date: {$post->getCreatedTime()} <br/> ";
        }
        return $output;
    }
}

// Read user credentials from the users.txt file
$usersFile = __DIR__ . '/users.txt';
$usersData = file($usersFile, FILE_IGNORE_NEW_LINES);
$userFirstName = ['Viktor','Nikola','Denis'];
$userLastName = ['Zafirovski','Cucukovski','Ziberi'];
$i=0;
// Loop through user data and perform actions for each user
foreach ($usersData as $userData) {
    
    list($username, $password) = explode(":", $userData);

    // Create a member using the provided username and password
    $user = new Member($userFirstName[$i], $userLastName[$i], $username, $password);
    $user->login();

    // Check if the member is authenticated
    if ($user->isLoggedIn()) {
        // Create a topic, add a post, and print topic and posts
        $topic = new Topic($user, "Sample Topic", "General");

        // Create a post object
        $post = new Post();
        $post->setTitle("Hello World");
        $post->setCategory("General");
        $post->setText("This is the content of the post.");

        $topic->addPost($user, $post);
        echo $topic->printTopic();
        echo $topic->printPosts();

        // Log out the member
        $user->logout();
    } else {
        echo "User $username is not authenticated.";
    }
    $i++;
}
