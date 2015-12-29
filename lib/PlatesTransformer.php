<?php

namespace MacFJA\PhpTransformer\Plates;

use League\Plates\Engine;
use PhpTransformers\PhpTransformer\TransformerInterface;

/**
 * Class PlatesTransformer.
 *
 * The PhpTransformer for Plates template engine.
 * {@link http://platesphp.com/}
 *
 * @author  MacFJA
 * @package MacFJA\PhpTransformer\Plates
 * @license MIT
 */
class PlatesTransformer implements TransformerInterface
{
    /** @var Engine */
    protected $plates;

    /**
     * The transformer constructor.
     *
     * Options are:
     *   - "plates" a \League\Plates\Engine instance
     *   - "default" the directory where Plates will search templates
     *   - "extension" the extension of template files
     * if the option "plates" is provided, options "default" and "extension" are ignored.
     *
     * @param array $options The PlatesTransformer options
     */
    public function __construct(array $options = array())
    {
        if (array_key_exists('plates', $options)) {
            $this->plates = $options['plates'];
        } else {
            $this->plates = new Engine();

            if (array_key_exists('directory', $options)) {
                $this->plates->setDirectory($options['directory']);
            } else {
                $this->plates->setDirectory(sys_get_temp_dir());
            }

            if (array_key_exists('extension', $options)) {
                $this->plates->setFileExtension($options['extension']);
            }
        }
    }

    /**
     * Get the transformer name
     *
     * @return string
     */
    public function getName()
    {
        return 'plates';
    }

    /**
     * Render a file
     *
     * @param string $file The file to render
     * @param array $locals The variable to use in template
     * @return null|string
     */
    public function renderFile($file, array $locals = array())
    {
        return $this->plates->render($file, $locals);
    }

    /**
     * Render a string
     *
     * @param string $template The template content to render
     * @param array $locals The variable to use in template
     * @return null|string
     */
    public function render($template, array $locals = array())
    {
        $tmpName = uniqid('plates_tmp_', false);
        $tmpPath = sys_get_temp_dir().'/'.$tmpName.'.'.$this->plates->getFileExtension();

        $isTmpRegister = $this->plates->getFolders()->exists(sys_get_temp_dir());
        if (!$isTmpRegister) {
            $this->plates->addFolder($tmpName, sys_get_temp_dir());
        }
        file_put_contents($tmpPath, $template);

        $data = $this->plates->render($tmpName, $locals);

        unlink($tmpPath);
        if (!$isTmpRegister) {
            $this->plates->getFolders()->remove($tmpName);
        }

        return $data;
    }
}
