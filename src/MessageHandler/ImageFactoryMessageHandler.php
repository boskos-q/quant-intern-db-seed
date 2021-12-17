<?php

namespace App\MessageHandler;

use App\Factory\CommentFactory;
use App\Factory\ImageFactory;
use App\Message\ImageFactoryMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class ImageFactoryMessageHandler implements MessageHandlerInterface
{
    public function __invoke(ImageFactoryMessage $message)
    {
        $user = $message->getUser();
        ImageFactory::createMany(1, function() use ($user) {
            return [
                'user'     => $user,
                'comments' => CommentFactory::new(['user' => $user])->many(1,3),
            ];
        });
    }
}
