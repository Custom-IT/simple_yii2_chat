<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Messages extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%messages}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create',
                'updatedAtAttribute' => 'update',
                'value' => new Expression('datetime("now")'),
            ],
        ];
    }

    public function rules()
    {
    	/* todo: по т.з. не предусмотрен html блок для вывода сообщения об ошибке вводимых значений, поэтому их задаем как ""*/
        return [
            [['firstname','lastname','message','session'], 'required'],
            [['create','update'], 'safe'],
            ['firstname', 'match', 'not'=> true, 'pattern' => '/^Имя$/', "message" => ""],
            ['lastname', 'match', 'not'=> true, 'pattern' => '/^Фамилия$/', "message" => ""],
            ['message', 'match', 'not'=> true, 'pattern' => '/^Введите текст сообщения$/', "message" => ""],
            ['firstname', 'string', 'length' => [4, 32], "message" => "", "notEqual" => "", "tooLong" => "", "tooShort"=>""],
            ['lastname', 'string', 'length' => [4, 32], "message" => "", "notEqual" => "", "tooLong" => "", "tooShort"=>""],
            ['message', 'string', 'length' => [1, 2048], "message" => "", "notEqual" => "", "tooLong" => "", "tooShort"=>""],
        ];
    }

    public static function botMessage()
    {
    	$message = new self();
    	$data['Messages'] = self::_fakeData();
    	$message->load($data);
    	$message->session = "chat-bot-session-id";
    	// var_dump($message->attributes);
    	$message->save();
    }

    private static function _fakeData()
    {
    	$fakeData = [
    		[
    			"firstname" => "Оскар",
    			"lastname" => "Уайльд",
    			"message" => "Я слышал столько клеветы в Ваш адрес, что у меня нет сомнений: Вы — прекрасный человек!",
    		],
    		[
    			"firstname" => "Марина",
    			"lastname" => "Цветаева",
    			"message" => "Вы мне сейчас — самый близкий, вы просто у меня больнее всего болите.",
    		],
    		[
    			"firstname" => "Альберт",
    			"lastname" => "Эйнштейн",
    			"message" => "Есть только две бесконечные вещи: Вселенная и глупость. Хотя насчет Вселенной я не вполне уверен.",
    		],
    		[
    			"firstname" => "Стивен",
    			"lastname" => "Кинг",
    			"message" => "К прошлому следует относиться безжалостно и спокойно. Те удары, которые нас убивают, не имеют значения. Имеют значение только те, после которых мы выстояли и живем.",
    		],
    		[
    			"firstname" => "Агата",
    			"lastname" => "Кристи",
    			"message" => "Быть леди — не значит носить красивые платья, быть леди — значит спокойно и с достоинством принимать удары судьбы, по мере сил помогать тем, кого любишь и не жаловаться, даже если кажется, что сил больше нет.",
    		],
    	];
    	return $fakeData[rand(0, count($fakeData)-1)];
    }
}