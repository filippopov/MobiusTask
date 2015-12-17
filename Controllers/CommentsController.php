<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 12/17/2015
 * Time: 8:57 PM
 */

namespace Mobius\Controllers;


use Mobius\BindingModels\Comments\CommentsBindingModel;
use Mobius\Models\CommentsRepository;
use Mobius\View;
use Mobius\ViewModels\CommentViewModel;

class CommentsController extends Controller {


    public function allComments(){

        $comments = CommentsRepository::create()->orderByDescending(CommentsBindingModel::ID)->findAll();
        $commentsViewModel = [];
        foreach($comments as $comment){
            $commentsViewModel[] = new CommentViewModel(
                $comment->getId(),
                $comment->getComment(),
                $comment->getDateTime(),
                $comment->getAuthorName(),
                $comment->getUserId()
            );
        }

        $this->escapeAll($commentsViewModel);

        return new View($commentsViewModel);

    }
} 