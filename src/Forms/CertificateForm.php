<?php

namespace elgazar\Certificate\Forms;

use Botble\Base\Forms\FieldOptions\NameFieldOption;
use Botble\Base\Forms\FieldOptions\StatusFieldOption;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\Fields\MediaImageField;
use Botble\Base\Forms\FieldOptions\MediaImageFieldOption;
use Botble\Base\Forms\FormAbstract;
use elgazar\Certificate\Http\Requests\CertificateRequest;
use elgazar\Certificate\Models\Certificate;

class CertificateForm extends FormAbstract
{
    public function setup(): void
    {
        $this
            ->model(Certificate::class)
            ->setValidatorClass(CertificateRequest::class)
            ->add(
                'image_url',
                MediaImageField::class,
                MediaImageFieldOption::make()->required()
            )
            ->add('title', TextField::class, NameFieldOption::make())
            ->add('status', SelectField::class, StatusFieldOption::make())
            ->setBreakFieldPoint('status');
    }
}