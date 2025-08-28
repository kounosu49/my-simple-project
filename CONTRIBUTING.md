# Contributing Guidelines

## Protected Files

The following files are protected and can only be modified by the repository owner (@kounosu49):

- `index.html` - Core application file

## For Contributors

If you need to suggest changes to `index.html`:

1. Open an issue describing the required changes
2. Wait for owner approval
3. The owner will make the changes or grant temporary permission

## Setting up local protection

To enable local protection, run:

```bash
cp .github/pre-commit .git/hooks/pre-commit
```

This will prevent accidental commits to protected files.