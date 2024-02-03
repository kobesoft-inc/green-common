<?php

namespace Green\AdminAuth\Traits;

use Closure;
use Illuminate\Database\Eloquent\Model;

/**
 * NestedSetの選択肢
 */
trait HasNodeOptions
{
    /**
     * このモデルの選択肢を取得する
     *
     * @param Closure|null $closure 条件を加えるためのクロージャ
     * @param bool $html 選択肢をHTML文字列で表現するか？
     * @return array<string, string>
     */
    static public function getOptions(Closure $closure = null, bool $html = true): array
    {
        // IDのカラム
        $idColumn = (new static())->primaryKey;

        // 選択肢のタイトルのカラム
        $titleColumn = defined(static::class . '::TITLE') ? static::TITLE : 'name';

        // 選択肢を取得
        $query = static::query();
        if ($closure) {
            $query = $closure($query);
        }
        return $query
            ->with('ancestors')
            ->defaultOrder()
            ->get()
            ->mapWithKeys(fn(Model $model) => [
                $model->$idColumn => $html
                    ? $model->$titleColumn
                    : $model->getOptionLabel($titleColumn)
            ])
            ->toArray();
    }

    /**
     * 選択肢の文字列を取得する
     *
     * @return string  選択肢の文字列
     */
    private function getOptionLabel(string $titleColumn): string
    {
        return
            ($this->parent_id
                ? '<span class="text-gray-500">' . e($this->ancestors->pluck('name')->join(' > ') . ' > ') . '</span>'
                : ''
            ) . e($this->$titleColumn);
    }
}
