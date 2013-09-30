App::uses('User', 'AppModel');

class User extends AppModel {
    public $hasMany = array(
        'MyRecipe' => array(
            'className' => 'Recipe',
        )
    );
    
}