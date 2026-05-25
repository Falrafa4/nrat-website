<?php

namespace App\Filament\Resources\Addons\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class AddonForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Utama')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Addon')
                            ->required()
                            ->maxLength(255)
                            ->live()
                            ->afterStateUpdated(function (Set $set, ?string $state) {
                                $set('slug', str()->slug($state), shouldCallUpdatedHooks: true);
                            }),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        Select::make('category_id')
                            ->label('Kategori')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Textarea::make('short_description')
                            ->label('Deskripsi Singkat')
                            ->rows(3)
                            ->maxLength(255)
                            ->columnSpanFull(),

                        RichEditor::make('description')
                            ->label('Deskripsi Lengkap')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Media')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->label('Thumbnail')
                            ->image()
                            ->directory('addons/thumbnails')
                            ->imageEditor()
                            ->columnSpanFull(),
                    ]),

                Section::make('Informasi Download')
                    ->schema([
                        TextInput::make('download_url')
                            ->label('Link Download')
                            ->url()
                            ->required()
                            ->maxLength(2048),

                        TextInput::make('source_name')
                            ->label('Sumber Download')
                            ->placeholder('Google Drive, MediaFire, dll.')
                            ->maxLength(50),

                        TextInput::make('file_size')
                            ->label('Ukuran File (MB)')
                            ->placeholder('Contoh: 24 MB')
                            ->maxLength(100),

                        TextInput::make('game_version')
                            ->label('Versi Game')
                            ->placeholder('Contoh: TRS19 / TRS22')
                            ->maxLength(100),
                    ])
                    ->columns(2),

                Section::make('Status Publikasi')
                    ->schema([
                        Select::make('addon_type')
                            ->label('Tipe Addon')
                            ->options([
                                'freeware' => 'Freeware',
                                'private' => 'Private',
                                'payware' => 'Payware',
                            ])
                            ->default('freeware')
                            ->required(),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                            ])
                            ->default('draft')
                            ->required(),

                        Toggle::make('is_featured')
                            ->label('Tampilkan di Featured')
                            ->default(false),

                        DateTimePicker::make('published_at')
                            ->label('Tanggal Publikasi'),
                    ])
                    ->columns(3),
            ]);
    }
}
