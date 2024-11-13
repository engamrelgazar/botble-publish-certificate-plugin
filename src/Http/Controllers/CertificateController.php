<?php

namespace elgazar\Certificate\Http\Controllers;

use Botble\Base\Http\Actions\DeleteResourceAction;
use elgazar\Certificate\Http\Requests\CertificateRequest;
use elgazar\Certificate\Models\Certificate;
use Botble\Base\Http\Controllers\BaseController;
use elgazar\Certificate\Tables\CertificateTable;
use elgazar\Certificate\Forms\CertificateForm;
use Botble\SeoHelper\Facades\SeoHelper;
use Botble\Theme\Facades\Theme;

class CertificateController extends BaseController
{
    public function __construct()
    {
        $this
            ->breadcrumb()
            ->add(trans(trans('plugins/certificate::certificate.name')), route('certificate.index'));
    }
    public function certificates()
    {
        SeoHelper::setTitle(__('Certificates'));

        Theme::breadcrumb()->add(__('Certificates'), route('public.certificates'));

        $certificates = Certificate::query()
            ->where('status', 'published')
            ->orderByDesc('created_at')
            ->paginate(10);

        // عرض الشهادات باستخدام قالب Theme
        return Theme::scope('certificate.certificates', compact('certificates'), 'plugins/certificate::themes.certificates')->render();
    }
    public function index(CertificateTable $table)
    {
        $this->pageTitle(trans('plugins/certificate::certificate.name'));

        return $table->renderTable();
    }

    public function create()
    {
        $this->pageTitle(trans('plugins/certificate::certificate.create'));

        return CertificateForm::create()->renderForm();
    }

    public function store(CertificateRequest $request)
    {
        $form = CertificateForm::create()->setRequest($request);

        $form->save();

        return $this
            ->httpResponse()
            ->setPreviousUrl(route('certificate.index'))
            ->setNextUrl(route('certificate.edit', $form->getModel()->getKey()))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function edit(Certificate $certificate)
    {
        $this->pageTitle(trans('core/base::forms.edit_item', ['id' => $certificate->id]));

        return CertificateForm::createFromModel($certificate)->renderForm();
    }

    public function update(Certificate $certificate, CertificateRequest $request)
    {
        CertificateForm::createFromModel($certificate)
            ->setRequest($request)
            ->save();

        return $this
            ->httpResponse()
            ->setPreviousUrl(route('certificate.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function destroy(Certificate $certificate)
    {
        return DeleteResourceAction::make($certificate);
    }
}