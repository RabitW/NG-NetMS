<?php
/* @var $this AttrValueController */
/* @var $model AttrValue */
/* @var $form CActiveForm */
$accesses = new Access('search');
$wrapped=$accesses->getWrappableMethods();
$amount_arr = count($arr_attrs);
function getAttrVal($attr){
//    \NGNMS\Emsgd::pp($arr_attrs);

    return empty($attr['value'])?null:$attr['value'];
}

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attr-value-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
));
?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
<?php
echo $form->errorSummary($model);

for ($i = 0; $i < $amount_arr; $i++) {




    echo $form->hiddenField($model, "[$i]id_access");
    echo CHtml::hiddenField("id_attr_access[$i]", $arr_attrs[$i]['id_t']); ?>
    <div class="row">
        <?
        echo $form->labelEx($model, "[$i]value", array('label' => $arr_attrs[$i]['name']));
        switch($arr_attrs[$i]['name']){
            case 'WrappedAccess':
                $dp =  CHtml::listData($wrapped,'id','name');
                echo $form->dropDownList($model, "[$i]value", $dp,['options'=>[getAttrVal($arr_attrs[$i])=>['selected'=>true]]]);
                break;
            case 'CmdOptions':
                echo $form->textArea($model, "[$i]value", array('value' => getAttrVal($arr_attrs[$i]), 'rows' => 6, 'cols' => 50));
                break;
            default:
                echo $form->textField($model, "[$i]value",
                    array('value' => getAttrVal($arr_attrs[$i])));
        }
        echo $form->error($model, 'value');
        ?>
    </div>
<?php } ?>

	<div class="row buttons">
		<?php echo  CHtml::submitButton('Save');; ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->