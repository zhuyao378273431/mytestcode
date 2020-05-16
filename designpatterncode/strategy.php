<?php
/*
1.client根据自身需求选择需要的策略
2.在项目中常用常用把策略封装到配置中去切换具体策略
3.抽象具体策略，使context开闭解耦
*/
interface StrategyInterface{
     public function fire();
}
class NuclearStrategy implements  StrategyInterface{
    public function fire(){
        var_dump('nuclear fire');
    }
}
class DefaultStrategy implements  StrategyInterface{
    public function fire(){
        var_dump('default one bullet fire');
    }
}
class FourbulletStrategy implements  StrategyInterface{
    public function fire(){
        var_dump('nuclear fire');
    }
}

class Context{
    
    protected $strategy;
    
    public function fire(){
        $this->strategy->fire();
    }
    
    public function setStrategy( $strategy ){
        try{
        if($strategy instanceof StrategyInterface){
             
        }
        $this->strategy = $strategy;
        return $this;
        }catch(Exception $e){
            
        }
    }
}
$context = new Context();
$context->setStrategy(new FourbulletStrategy())->fire();
$context->setStrategy(new DefaultStrategy())->fire();





?>