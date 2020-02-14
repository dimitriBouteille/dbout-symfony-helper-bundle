<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Form\Type;

use Dbout\Bundle\SvgLoaderBundle\Loader\DboutSvgLoaderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class SubmitWithSvgIconType
 * @package Dbout\Bundle\SymfonyHelperBundle\Form\Type
 */
class SubmitWithSvgIconType extends AbstractType
{

    /**
     * @var DboutSvgLoaderInterface
     */
    private $svgService;

    /**
     * SubmitWithSvgIconType constructor.
     * @param ContainerInterface $container
     * @throws \Exception
     */
    public function __construct(ContainerInterface $container)
    {
        if(!$container->has('dbout.svg_loader.loader')) {
            throw new \Exception('Service dbout.svg_loader.loader is undefined');
        }

        $this->svgService = $container->get('dbout.svg_loader.loader');
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'iconName' =>       null,
            'iconPosition' =>   'right',
        ]);

        $resolver->addAllowedValues('iconPosition', ['left', 'right']);
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'button_submit_svg_icon';
    }

    /**
     * @return string|null
     */
    public function getParent()
    {
        return ButtonType::class;
    }

    /**
     * @param FormView $view
     * @param FormInterface $form
     * @param array $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if(!empty($options['iconName'])) {
            $icon = $this->svgService->load($options['iconName']);
            if($icon) {
                $view->vars['svgIcon'] = $icon;
            }
        }

        $position = 'right';
        if(empty($options['iconPosition'])) {
            $position = $options['iconPosition'];
        }
        $view->vars['svgPosition'] = $position;
        $view->vars['type'] = 'submit';
    }

}