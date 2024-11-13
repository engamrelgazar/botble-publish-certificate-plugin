<?php

namespace elgazar\Certificate\Tables;

use elgazar\Certificate\Models\Certificate;
use Botble\Table\Abstracts\TableAbstract;
use Botble\Table\Actions\DeleteAction;
use Botble\Table\Actions\EditAction;
use Botble\Table\BulkActions\DeleteBulkAction;
use Botble\Table\BulkChanges\CreatedAtBulkChange;
use Botble\Table\BulkChanges\NameBulkChange;
use Botble\Table\BulkChanges\StatusBulkChange;
use Botble\Table\Columns\CreatedAtColumn;
use Botble\Table\Columns\IdColumn;
use Botble\Table\Columns\NameColumn;
use Botble\Table\Columns\ImageColumn;
use Botble\Table\Columns\StatusColumn;
use Botble\Table\HeaderActions\CreateHeaderAction;
use Illuminate\Database\Eloquent\Builder;

class CertificateTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(Certificate::class)
            ->addHeaderAction(CreateHeaderAction::make()->route('certificate.create'))
            ->addActions([
                EditAction::make()->route('certificate.edit'),
                DeleteAction::make()->route('certificate.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                ImageColumn::make('image_url')
                ->searchable(false)
                ->orderable(false),
                IdColumn::make(),
                NameColumn::make('title')->route('certificate.edit'),
                CreatedAtColumn::make(),
                StatusColumn::make(),
            ])
            ->addBulkActions([
                DeleteBulkAction::make()->permission('certificate.destroy'),
            ])
            ->addBulkChanges([
                NameBulkChange::make(),
                StatusBulkChange::make(),
                CreatedAtBulkChange::make(),
            ])
            ->queryUsing(function (Builder $query) {
                $query->select([
                    'id',
                    'image_url',
                    'title',
                    'created_at',
                    'status',
                ]);
            });
    }
}