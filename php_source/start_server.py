#!/usr/bin/env python3
import os
import sys
import subprocess
import webbrowser
import time

PORT = 8080
DIRECTORY = os.path.dirname(os.path.abspath(__file__))
URL = f"http://localhost:{PORT}"

def run():
    os.chdir(DIRECTORY)
    print("\n=======================================================")
    print("   FD Studio - Pure PHP Built-in Server")
    print(f"   URL: {URL}")
    print(f"   Directory: {DIRECTORY}")
    print("=======================================================\n")
    print("Press Ctrl+C to stop the server.\n")

    try:
        webbrowser.open(URL)
    except Exception:
        pass

    try:
        subprocess.run(["php", "-S", f"127.0.0.1:{PORT}"], cwd=DIRECTORY)
    except KeyboardInterrupt:
        print("\nServer stopped.")
        sys.exit(0)

if __name__ == '__main__':
    run()
