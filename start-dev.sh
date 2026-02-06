#!/bin/bash

# 启动开发环境的脚本

echo "=========================================="
echo "  启动前后端开发环境"
echo "=========================================="

# 启动后端
echo ""
echo "[1/2] 启动 Laravel 后端 (http://127.0.0.1:8000)..."
cd backend

# 检查数据库是否存在，如果不存在则创建
if [ ! -f database/database.sqlite ]; then
    echo "      创建 SQLite 数据库..."
    touch database/database.sqlite
fi

# 运行迁移
php artisan migrate --force

# 启动 Laravel 服务
php artisan serve --host=127.0.0.1 --port=8000 &
LARAVEL_PID=$!

cd ../

# 启动前端
echo ""
echo "[2/2] 启动 Vue 前端 (http://localhost:3002)..."
cd frontend/web

# 安装依赖（如果需要）
if [ ! -d node_modules ]; then
    echo "      安装前端依赖..."
    pnpm install
fi

# 启动前端开发服务器
pnpm run dev &
VITE_PID=$!

cd ../..

echo ""
echo "=========================================="
echo "  开发环境已启动!"
echo ""
echo "  前端: http://localhost:3002"
echo "  后端: http://127.0.0.1:8000"
echo ""
echo "  按 Ctrl+C 停止服务"
echo "=========================================="

# 捕获 Ctrl+C 信号并清理进程
trap "echo ''; echo '正在停止服务...'; kill $LARAVEL_PID $VITE_PID 2>/dev/null; exit" INT

# 等待进程
wait
