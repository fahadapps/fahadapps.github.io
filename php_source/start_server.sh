#!/usr/bin/env bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"
cd "$DIR"

PORT=8080
URL="http://localhost:$PORT"

echo "======================================================="
echo "   FD Studio - Pure PHP Server Started"
echo "   URL: $URL"
echo "   Directory: $DIR"
echo "======================================================="
echo "Press Ctrl+C to stop the server."
echo ""

open "$URL" 2>/dev/null || true

exec php -S 127.0.0.1:$PORT
