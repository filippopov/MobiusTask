<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" href="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/css/bootstrap.min.css"/>
    <!-- Bootstrap -->

    <link rel="stylesheet" type="text/css" href="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/css/prettify.css"/>
    <link rel="stylesheet" type="text/css" href="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/src/bootstrap-wysihtml5.css"/>
    <link rel="stylesheet" type="text/css" href="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/css/wysiwyg-color.css"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->
</head>
<body>
<br/>
<div class="container">

    <div class="jumbotron">
        <form method="post">
            <h1>WYSIWYG Text Editor</h1>
            <textarea class="textarea" style="width:100%;height:300px;" name="comment" id="comment"><?=$model[0]->getComment();?></textarea>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" name="edit-comment" value="Edit-Comment" id="edit-comment" />
                    <a href="http://localhost:8004/MobiusTask/comments/allcomments" type="button" class="btn btn-success">Back to Comments</a>
                </div>
            </div>
        </form>
    </div>

</div>

<script src="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/js/wysihtml5-0.3.0.js"></script>
<script src="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/js/jquery-1.7.2.min.js"></script>
<script src="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/js/prettify.js"></script>
<script src="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/js/bootstrap.min.js"></script>
<script src="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/src/bootstrap-wysihtml5.js"></script>
<script src="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/js/bootstrap-button.js"></script>

<script>
    $('.textarea').wysihtml5();
</script>

<script type="text/javascript" charset="utf-8">
    $(prettyPrint);
</script>
</body>
</html>

<?php if($model[1]->error === true): ?>
    <h2>An error occurred</h2>
<?php elseif($model[1]->success === true): ?>
    <h2>Successfully Edit Comment</h2>
<?php endif; ?>