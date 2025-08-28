# index.html 保護設定について

## 概要
このリポジトリでは、`index.html`ファイルの変更を制限し、許可されたユーザーまたはCMS経由でのみ変更可能にしています。

## 保護の仕組み

### GitHub Actions による保護
- プルリクエストで`index.html`が変更された場合、自動的にチェックが実行されます
- 以下の条件を満たす場合のみ変更が許可されます：
  1. 許可されたユーザーからの変更
  2. CMS経由の自動更新（PRタイトルに`[CMS]`を含む）

### 許可されたユーザー
- `@kounosu49` (リポジトリオーナー)
- `cms-bot` (CMS用ボット)
- `github-actions[bot]` (GitHub Actions)

## CMS連携について

### 将来的なCMS統合
CMSから`index.html`を更新する場合：

1. **CMSボットアカウントを使用**
   - `cms-bot`というユーザー名でPRを作成
   
2. **PRタイトルにタグを付ける**
   - タイトルに`[CMS]`または`cms-update`を含める
   - 例: `[CMS] コンテンツ更新` 

3. **Webhook経由での更新**
   ```javascript
   // CMS側の実装例
   const updateContent = async () => {
     const pr = await createPullRequest({
       title: "[CMS] index.html更新",
       branch: "cms-update-" + Date.now(),
       files: {
         "index.html": newContent
       }
     });
   };
   ```

## 他の開発者へのガイドライン

`index.html`の変更が必要な場合：

1. **Issue を作成**
   - 変更内容を詳細に記載
   - 変更理由を説明

2. **オーナーに連絡**
   - @kounosu49 に変更をレビューしてもらう

3. **代替案を検討**
   - 別のファイルで実装可能か検討
   - CMSで管理すべき内容か確認

## 設定の変更方法

保護設定を変更する場合は、以下のファイルを編集：

- `.github/workflows/protect-index.yml` - GitHub Actions の設定
- `ALLOWED_USERS` 配列に新しいユーザーを追加

## トラブルシューティング

### エラーが発生した場合
1. PRタイトルを確認（CMS更新の場合）
2. ユーザー名が許可リストに含まれているか確認
3. GitHub Actionsのログを確認

### ローカルでのテスト
```bash
# ローカルでの保護を有効化
cp .github/pre-commit .git/hooks/pre-commit
```

## 今後の拡張予定
- [ ] CMS APIトークンによる認証
- [ ] 特定のセクションのみ編集可能にする
- [ ] 変更履歴の自動記録