<?php

namespace App\Filament\Resources\Address;

use App\Filament\Resources\Address\ProvinceResource\Pages;
use App\Filament\Resources\Address\ProvinceResource\RelationManagers;
use App\Models\Address\Province;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProvinceResource extends Resource
{
    protected static ?string $model = Province::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->label('Kode Provinsi')
                    ->required()
                    ->maxLength(2)
                    ->minLength(2)
                    ->regex('/^\d{2}$/')
                    ->unique(ignoreRecord: true)
                    ->validationMessages([
                        'unique' => 'Kode ini sudah digunakan! Silakan pilih kode lain.',
                    ]),

                Forms\Components\TextInput::make('name')
                    ->label('Nama Provinsi')
                    ->required(true)
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Kode Provinsi'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Provinsi'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProvinces::route('/'),
            'create' => Pages\CreateProvince::route('/create'),
            'edit' => Pages\EditProvince::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Provinsi';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Provinsi';
    }
}
