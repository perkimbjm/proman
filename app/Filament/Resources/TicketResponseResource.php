<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResponseResource\Pages;
use App\Filament\Resources\TicketResponseResource\RelationManagers;
use App\Models\TicketResponse;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TicketResponseResource extends Resource
{
    protected static ?string $model = TicketResponse::class;

    protected static ?string $navigationGroup = 'Manajemen Pengaduan';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Respon';

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('ticket_id')
                    ->relationship('ticket', 'id')
                    ->required(),
                Forms\Components\Select::make('admin_id')
                    ->relationship('admin', 'name')
                    ->required(),
                Forms\Components\Textarea::make('issue')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('response')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID'),
                Tables\Columns\TextColumn::make('ticket.id'),
                Tables\Columns\TextColumn::make('admin.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTicketResponses::route('/'),
        ];
    }
}
