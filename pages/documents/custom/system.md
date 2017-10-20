系统文档
- [系统常见问题](./document.php?f=faq)
- [如何避免由于编译器差别带来的错误](./document.php?f=compiler)
- [编译环境说明](./document.php?f=system)

***

# 编译器与编译参数说明

本系统目前提供 GCC/G++ 和 Sun-JDK 编译器，它们的编译参数是：

  -  C: gcc -static -w -lm -std=c99 -O2
  -  C++: g++ -static -w -O2
  -  Java: javac source.java

我们的服务器运行在Linux平台下，提供的编译器的版本分别是：

  -  gcc/g++ Version 4.4.3
  -  Java SDK Version 1.6.0_21

比赛的运行结果以上述编译器版本为准。大家可以使用 VC 做题，但为避免编译错误，建议将写好的程序在 Dev-CPP 中编译运行通过再提交。
