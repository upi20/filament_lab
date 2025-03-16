<?php

namespace App\Filament\Resources\Address;

use App\Filament\Resources\Address\RegencieResource\Pages;
use App\Filament\Resources\Address\RegencieResource\RelationManagers;
use App\Models\Address\Province;
use App\Models\Address\Regencie;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegencieResource extends Resource
{
    protected static ?string $model = Regencie::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('province_id')
                    ->label('Provinsi')
                    ->relationship('province', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\TextInput::make('id')
                    ->label('Kode ' . self::getModelLabel())
                    ->required()
                    ->maxLength(4)
                    ->minLength(4)
                    ->regex('/^\d{4}$/')
                    ->unique(ignoreRecord: true)
                    ->validationMessages([
                        'unique' => 'Kode ini sudah digunakan! Silakan pilih kode lain.',
                    ]),

                Forms\Components\TextInput::make('name')
                    ->label('Nama ' . self::getModelLabel())
                    ->required(true)
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Kode ' . self::getModelLabel())
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama ' . self::getModelLabel())
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('province.name')
                    ->label('Provinsi')->sortable()
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('province_id')
                    ->label('Filter Provinsi')
                    ->options(fn() => Province::pluck('name', 'id')->toArray())
                    ->attribute('province_id')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->searchPlaceholder('Cari ' . self::getModelLabel() . '...');
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
            'index' => Pages\ListRegencies::route('/'),
            'create' => Pages\CreateRegencie::route('/create'),
            'edit' => Pages\EditRegencie::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Kota/Kabupaten';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Kota/Kabupaten';
    }
}
