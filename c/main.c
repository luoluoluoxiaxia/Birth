/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* 
 * File:   main.c
 * Author: mjl
 *
 * Created on 2017年1月5日, 下午2:31
 */

#include <stdio.h>
#include <stdlib.h>

/*
 * extern 可以声明变量
 */
extern int i;
/*
 * 预处理器定义常量 
 */
#define B 10
#define A 20
int max(int,int);
void swap(int *,int *);
int main() {
    /*
     * 定义了变量 i
     */
//    int *a;
//    int b = 10;
//    a = &b;
//    //printf("%p",&b);
//    *a = 5;
//    printf("%d\n",*a);
//    printf("%d",b);
    int a = 10,b = 20,c,d;
    c = max(a,b);
    swap(&a,&b);
    printf("当前比大小结果为：%d",c);
    printf("当前交换结果为：%d，%d",a,b);
    return 0;
}
int max(int min,int max){
    int result;
    if(min >max)
        result = min;
    else
        result = max;
    return result;
}

void swap(int *a,int *b){
    int temp;
    temp = *a;
    *a = *b;
    *b =temp;
}



