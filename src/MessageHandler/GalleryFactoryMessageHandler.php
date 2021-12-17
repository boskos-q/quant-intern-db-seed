<?php

namespace App\MessageHandler;

use App\Factory\CommentFactory;
use App\Factory\GalleryFactory;
use App\Factory\ImageFactory;
use App\Message\GalleryFactoryMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class GalleryFactoryMessageHandler implements MessageHandlerInterface
{
    public function __invoke(GalleryFactoryMessage $message)
    {
        $user = $message->getUser();
        GalleryFactory::createMany(1, function () use ($user) {
            return [
                'user'     => $user,
                'images'   => ImageFactory::new(['user' => $user])->many(1,20),
                'comments' => CommentFactory::new(['user' => $user])->many(1,3)
            ];
        });
    }
}
