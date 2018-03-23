<?php
include 'Database.php';
session_start();
class chatController
{
    public static function notify()
    {
        if(isset($_SESSION['id']))
        {
            $id = $_SESSION['id'];
            return Database::get_notifications($id);
        }
        else return null;
    }

    public static function open_chatRoom()
    {
        if(isset($_SESSION['id']))
        {
            $id = $_SESSION['id'];
            return Database::get_chats($id);
        }
        else return null;
    }

    public static function start_chat()
    {
            if(isset($_SESSION['id']))
            {
                $x=self::get_chat();
                $id2=$x['second_id'];
                Database::receive($_SESSION['id'],$id2);
                return Database::get_messages($_SESSION['id'],$id2);
            }
            else
            {
               // header("Location: ../chatRoom.php?remove=error");
                //exit();
            }
    }

    public static function send_message()
    {
        if(isset($_POST['send-message']))
        {
            if(isset($_SESSION['id']))
            {
                $id = $_SESSION['id'];
                $x=self::get_chat();
                $second_id=$x['second_id'];
                $country=$_GET['country'];
                if(!Database::chat_existence($id,$second_id))
                {
                    header("Location: chat.php?chat=".$_GET['chat']."?=error");
                    exit();
                }
                $message=$_POST['message'];
                $date=date('Y-m-d H:i:s');
                $send=Database::send_message($id,$second_id,$message,$date);
                if($send)
                {
                    header("Location: chat.php?chat=".$_GET['chat']."");
                    exit();
                }
                else
                {
                    header("Location: chat.php?chat=".$_GET['chat']."");
                    exit();
                }
            }
            else
            {
                header("Location: HSignin.php");
                exit();
            }
        }
    }

    public static function get_chat()
    {

            if(isset($_SESSION['id']))
            {
                $id=$_GET['chat'];
                if(Database::chat_existence_by_id($id))
                {
                    $data=Database::get_chat($id,$_SESSION['id']);
                    return $data;
                }
                else
                {
                    /*header("Location: ChatRoom.php?existence=error");
                    exit();*/
                }
            }
            else
            {
                /*header("Location: HSignin.php?login=error");
                exit();*/
            }
    }

    public static function set_chat()
    {
        if(isset($_POST['set-chat']))
        {
             $country=$_GET['country'];
            $second_id=$_POST['second_id'];
            if(Database::chat_existence($_SESSION['id'],$second_id))
            {
                $chat_id=Database::get_chat_id($_SESSION['id'],$second_id);
                //echo $chat_id;exit();
                header("Location: chat.php?chat=".$chat_id."&country=".$country."");
                exit();
            }
            //echo $second_id ;exit();
            $chat_id1=$_SESSION['id'].$second_id.uniqid('',true);
            $chat_id2=$second_id.$_SESSION['id'].uniqid('',true);
            $chat_id1=password_hash($chat_id1,PASSWORD_DEFAULT);
            $chat_id2=password_hash($chat_id2,PASSWORD_DEFAULT);
            Database::set_chat($_SESSION['id'],$second_id,$chat_id1,$chat_id2);
            if(Database::chat_existence($_SESSION['id'],$second_id))
            {
                $chat_id=Database::get_chat_id($_SESSION['id'],$second_id);
                header("Location: chat.php?chat=".$chat_id."&country=".$country."");
                exit();
            }
            else
            {
                header("Location: chatroom.php?chat=error&country=".$country."");
                exit();
            }
        }
    }

}