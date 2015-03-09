#include <stdio.h>
//program to find the 2nd largest element in an array 
//O(n) 

int main(void) {
	// your code goes here
	int a[]={5,4,3,2,1,6};
	int b1=a[0],b2=a[1],i;//b1 and b2 are the first and second largest elements
	if(b1<b2){
	b2=a[0];
	b1=a[1];	
	}
	
	for(i=2;i<6;i++){
		if(a[i]>b2){
			if(a[i]>b1){
				b2=b1;
				b1=a[i];
			}
		else {
		b2=a[i];
		}
	}
	}
	printf("b1=%d\nb2=%d",b1,b2);
	return 0;
}
