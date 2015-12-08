<?php
/**
 * Created by PhpStorm.
 * User: ahmedeltaweel
 * Date: 12/8/15
 * Time: 6:13 PM
 */

namespace Acme;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class renameFiles extends Command
{
	protected function configure()
	{
		$this->setName('sort')
			->setDescription('sort files in directory')
			->addArgument('path', InputArgument::REQUIRED, 'the path of the files')
			->addArgument('prefix', InputArgument::OPTIONAL, 'the prefix of new files names', 'f');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$path = $input->getArgument('path');
		$prefix = $input->getArgument('prefix');

		$output->writeln("<info> renaming files from this path: $path </info>");
		$output->writeln("<info> to this path: $path"."renamed-files </info>");
		$output->writeln("<info> using this prefix: $prefix </info>");
		$output->writeln('--------------------------------------------------------------');

		$i = 0;
		foreach (scandir($path) as $file) {
			//for linux to skip the parent dir
			if ($i > 1) {
				$output->writeln("<comment>renaming: $file </comment>");
				$output->writeln('--------------------------------------------------------------');

				//creating a folder if not exist
				if (!file_exists($path . "/" . 'renamed-files')) {
					if (!mkdir($path . "/" . 'renamed-files', 0777)) {
						die('failed to make dir');
					}
				}

				$path_parts = pathinfo($path . "/" . $file);
				//skip folders , copy and rename all files with the same extension
				if (isset($path_parts['extension'])) {
					if (!copy($path . "/" . $file, $path . '/renamed-files/' . $prefix . $i . "." . $path_parts['extension'])) {
						die('failed to copy');
					}
				}
			}
			$i++;
		}
	}
}