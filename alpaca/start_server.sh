#!/bin/bash

#coproc ./chat 
#nc -lk -p 9876 >&"${COPROC[1]}" <&"${COPROC[0]}" 
#ncat -lk -p 9876 | tee ~/chat_pipe | ./chat | tee ~/chat_pipe

#ncat -lnkp 9876 -e ./chat

rm -rf /tmp/f
mkfifo /tmp/f

cat /tmp/f | ./chat | nc -lk 9876 > /tmp/f # ответ обратно

# nc -lk 9876  | ./chat #ответ в консоль