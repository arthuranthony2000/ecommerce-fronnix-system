<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'teste')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }
    public function actionPermissoes(){
        $auth = Yii::$app->authManager;

        //remove permissao
        $auth->removeAll();

        $admin = $auth->createRole('admin');
        $usuario = $auth->createRole('usuario');

        $auth->add($admin);
        $auth->add($usuario);

        $controles = ['usuario','country','country-language','city'];
        $permissoes = ['create','update','delete'];

        foreach ($controles as $controle) {
            foreach ($permissoes as $permissao) {
                //cria uama permissao
                $perm = $auth->createPermission($controle.ucfirst($permissao));
                //guarda a permissao no sitema
                $auth->add($perm);
                //da a permissao para o admin
                $auth->addChild($admin,$perm);
            }
        }

        $controles = ['usuario','country','country-language','city'];
        $permissoes = ['index','view'];

        foreach ($controles as $controle) {
            foreach ($permissoes as $permissao) {
                $perm = $auth->createPermission($controle.ucfirst($permissao));

                $auth->add($perm);

                $auth->addChild($admin,$perm);
            }
        }
        $auth->addChild($admin,$usuario);
        $auth->assign($admin,1); //para dar permissao



    }
}