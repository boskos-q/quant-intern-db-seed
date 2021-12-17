<?php

namespace App\Command;

ini_set('max_execution_time', 0); // RIP
ini_set('memory_limit', '1024M');

use App\Factory\UserFactory;
use App\Message\GalleryFactoryMessage;
use App\Message\ImageFactoryMessage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

class QuantoxDbMessengerCommand extends Command
{
    protected static $defaultName = 'quantox:db:messenger';
    protected static $defaultDescription = 'Seed baze za quantox projekat 1 BE praksa pt2 putem rabbitMQ-a i sf messengera';
    protected MessageBusInterface $bus;
    public function __construct(string $name = null, MessageBusInterface $bus)
    {
        $this->bus = $bus;
        parent::__construct($name);
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        UserFactory::createMany(50);

        for($i = 0; $i < 100000; $i++) {

            $this->bus->dispatch(new GalleryFactoryMessage(UserFactory::random()->object()));
            $this->bus->dispatch(new ImageFactoryMessage(UserFactory::random()->object()));
        }

        return Command::SUCCESS;
    }
}
