<?php
$urlToRestApi = $this->Url->build('/api/categories', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Categories/index', ['block' => 'scriptBottom']);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
		
        <title>Crud PHP Ajax Example</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="panel panel-default categories-content">
                    <div class="panel-heading">Categories <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
                    <div class="panel-body none formData" id="addForm">
                        <h2><?= __('Add Category') ?></h2>
                        <form class="form" id="categoryForm">
                            <div class="form-group">
                                <?php
								echo $this->Form->control('name');
								?>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                            <a href="javascript:void(0);" class="btn btn-success" onclick="categoryAction('add')">Add Category</a>
                        </form>
                    </div>
                    <div class="panel-body none formData" id="editForm">
                        <h2 id="actionLabel"><?= __('Edit Category') ?></h2>
                        <form class="form" id="categoryForm">
                            <div class="form-group">
                                <?php
								echo $this->Form->control('name', ['id' => 'nameEdit']);
								?>
                            </div>
                            <input type="hidden" class="form-control" name="id" id="idEdit"/>
                            <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                            <a href="javascript:void(0);" class="btn btn-success" onclick="categoryAction('edit')">Update Category</a>
                        </form>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody id="categoryData">
                            <?php

                                foreach ($categories as $category):
                                    ?>
                                    <tr>
										<td><?php echo $category['id']; ?></td>
                                        <td><?php echo $category['name']; ?></td>
                                        <td>
                                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editCategory('<?php echo $category['id']; ?>')"></a>
                                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?') ? categoryAction('delete', '<?php echo $category['id']; ?>') : false;"></a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
	<?= $this->fetch('scriptLibraries') ?>
        <?= $this->fetch('script'); ?>
        <?= $this->fetch('scriptBottom') ?>   
</html>
